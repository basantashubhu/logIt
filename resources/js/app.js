// COMBOBOX DECLARATION
// ==============================
$.widget("custom.combobox", {
    _create: function () {
        this.wrapper = $("<span>")
            .addClass("combobox")
            .insertAfter(this.element);

        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
    },

    _createAutocomplete: function () {
        let selected = this.element.children(":selected"),
            value = selected.val() ? selected.text() : "";

        this.input = $("<input>")
            .appendTo(this.wrapper)
            .val('')
            .attr('required', true)
            .attr('placeholder', 'Select an Option...')
            .addClass("combobox-input")
            .autocomplete({
                delay: 0,
                minLength: 0,
                source: $.proxy(this, "_source")
            })
            .tooltip({
                classes: {
                    "ui-tooltip": "ui-state-highlight"
                }
            });

        this._on(this.input, {
            autocompleteselect: function (event, ui) {
                ui.item.option.selected = true;
                this._trigger("select", event, {
                    item: ui.item.option
                });
                this.input.autocomplete("search", "");
            },

            autocompletechange: "_removeIfInvalid"
        });
    },

    _createShowAllButton: function () {
        let input = this.input,
            wasOpen = false;

        $("<a>")
            .attr("tabIndex", -1)
            .appendTo(this.wrapper)
            .button({
                icons: {
                    primary: "ui-icon-triangle-1-s"
                },
                text: false
            })
            .removeClass("ui-corner-all")
            .addClass("combobox-toggle")
            .on("mousedown", function () {
                wasOpen = input.autocomplete("widget").is(":visible");
            })
            .on("click", function () {
                input.trigger("focus");

                // Close if already visible
                if (wasOpen) {
                    return;
                }

                // Pass empty string as value to search for, displaying all results
                input.autocomplete("search", "");
            });
    },

    _source: function (request, response) {
        let matcher = new RegExp('^' + $.ui.autocomplete.escapeRegex(request.term), "i");
        response(this.element.children("option").map(function () {
            let text = $(this).text();
            if (this.value && (!request.term || matcher.test(text)))
                return {
                    label: text,
                    value: text,
                    option: this
                };
        }));
    },

    _removeIfInvalid: function (event, ui) {

        // Selected an item, nothing to do
        if (ui.item) {
            return;
        }

        // Search for a match (case-insensitive)
        let value = this.input.val(),
            valueLowerCase = value.toLowerCase(),
            valid = false;
        this.element.children("option").each(function () {
            if ($(this).text().toLowerCase() === valueLowerCase) {
                this.selected = valid = true;
                return false;
            }
        });

        // Found a match, nothing to do
        if (valid) {
            return;
        }

        // Remove invalid value
        this.input
            .val("")
            .attr("title", value + " didn't match any item")
            .tooltip("open");
        this.element.val("");
        this._delay(function () {
            this.input.tooltip("close").attr("title", "");
        }, 2500);
        this.input.autocomplete("instance").term = "";
    },

    _destroy: function () {
        this.wrapper.remove();
        this.element.show();
    }
});

// TIME ENTRY
// ==============================
const timecard = {
    init() {
        $('#location').combobox({
            select: function (event, ui) {
                let locationId = ui.item.value
                $.ajax({
                    url: '/api/technicians',
                    type: 'GET',
                    data: {
                        location_id: locationId
                    },
                    success(response) {
                        timecard.populateTechs(response);
                    },
                    error(err) {
                        console.log('Error:', err);
                    }

                });
            }
        });
        $('.form-control.location .combobox-input').on('autocompleteselect', function () {
            $('.form-control.technician .combobox-input').val('');
            $('.form-control.job-type .combobox-input').val('');
        })
        $('#hours').on('change', function () {
            let val = parseFloat($(this).val());
            val = Math.round(val * 4);
            val = (val / 4).toFixed(2);
            if (val > 24) {
                val = (24).toFixed(2);
            }
            $(this).val(val);
        })
        $('button#complete').on('click', function (e) {
            e.preventDefault();
            $(window).scrollTop(0);
            location.reload();
        });
    },
    populateTechs(techs) {
        let select = $('#technician');
        select.empty();
        $('combobox-input').prop('value', '');
        techs.forEach(function (tech) {
            select.append(`<option value="${tech.value}">${tech.label}</option>`);
        });
        select.combobox({
            select: function (event, ui) {
                let techId = ui.item.value;
                $.ajax({
                    url: '/api/job-types',
                    type: 'GET',
                    success(response) {
                        timecard.populateJobTypes(response);
                    },
                    error(err) {
                        console.log('Error', err);
                    }
                })
            }
        })
        timecard.getJobTypes
    },
    populateJobTypes(types) {
        let select = $('#job-type');
        select.empty();
        types.forEach(function (type) {
            select.append(`<option value="${type.value}">${type.label}</option>`)
        })
        select.combobox()
    }

}
if ($('#time-entry,#locate-record').length) {
    timecard.init()
}

// TIME ENTRY SUBMISSION
// ==============================
const form = {
    init() {
        $('form[name="time-entry"]').on('submit', function (e) {
            e.preventDefault()
            $('form[name="time-entry"] button').attr('disabled', true);
            let input = $(this).serialize();
            $.ajax({
                url: '/api/time-logs',
                type: 'POST',
                data: input,
                success(response) {
                    form.addRow(response)
                    $('form button').attr('disabled', false);
                    $('.form-control.job-type .combobox-input').val('');
                    $('#job-name').val('');
                    $('#comment').val('');
                    $('#hours').val('');
                },
                error(err) {
                    console.log('Error', err);
                }
            })
        })

    },
    addRow(data) {
        let row = $('tr#clone').clone();
        row.removeAttr('id');
        row.attr('id', 'record-' + data.record_no);
        row.find('.edit-button').data('record', data.record_no);
        row.find('.date').html(moment(data.log_date).format('M/D/Y'));
        row.find('.location').html(data.loc_short_name);
        row.find('.technician').html(data.technician_name);
        row.find('.job-type').html(data.job_type);
        row.find('.job-name').html(data.job_name);
        row.find('.hours').html(data.log_hours);
        row.find('.comment').html(data.job_comment);
        let lastRow = $('tbody.logs tr:last');
        if (lastRow.length > 0) {
            row.insertAfter(lastRow);
        } else {
            let tableBody = $('tbody.logs');
            tableBody.append(row);
        }
        form.recalculateTotal()
    },
    recalculateTotal() {
        let total = 0;
        $('.logs .hours').each(function (i, time) {
            let hours = parseFloat($(time).html());
            total += hours;
        });
        $('tr.total-row td.total').html(total.toFixed(2));
    }

}
if ($('#time-entry').length) {
    form.init();
}

// LOCATE RECORD
// ==============================
const locate = {
    init() {
        $('form[name="locate-record"]').on('submit', function (e) {
            e.preventDefault()
            $('form[name="locate-record"] button').attr('disabled', true);
            let input = $(this).serialize();
            $.ajax({
                url: '/api/time-logs',
                type: 'GET',
                data: input,
                success(response) {
                    locate.addRows(response)
                    $('form button').attr('disabled', false);
                },
                error(err) {
                    console.log('Error', err);
                }
            });
        });
        $('button#clear').on('click',function() {
            $('tbody.logs').empty();
            form.recalculateTotal()
        });
    },
    addRows(rows) {
        $('tbody.logs').empty();
        rows.forEach(function (row) {
            form.addRow(row)
        });
        form.recalculateTotal()
    }
}
if ($('#locate-record').length) {
    locate.init()
}

// EDIT MODAL
// ==============================
const modal = {
    data: null,
    init() {
        $('body').on('click', '.edit-button', function (e) {
            e.preventDefault();
            let recordNo = $(this).attr('data-record');
            console.log({recordNo});
            modal.loadLog(recordNo)

            $('#location-edit').combobox({
                select: function (event, ui) {
                    let location_id = ui.item.value
                    $.ajax({
                        url: '/api/technicians',
                        type: 'GET',
                        data: {
                            location_id: location_id
                        },
                        success(response) {
                            modal.populateTechs(response);
                        },
                        error(err) {
                            console.log('Error:', err);
                        }
    
                    });
                }
            });
        })
        $('.shadow').on('click', function () {
            $('#edit-modal').removeClass('visible');
        })
        $('form[name="time-edit"]').on('submit', function (e) {
            e.preventDefault();
            let input = $(this).serialize();
            modal.submitForm(input);
        })
        $('#hours-edit').on('change', function () {
            let val = parseFloat($(this).val());
            val = Math.round(val * 4);
            val = (val / 4).toFixed(2);
            if (val > 24) {
               val = (24).toFixed(2);
            }

            $(this).val(val);
        })
    },
    loadLog(recordNo) {
        $.ajax({
            url: '/api/time-logs/' + recordNo,
            type: 'GET',
            success(response) {
                modal.data = response;
                // console.log(modal.data);
                modal.getTechs()
            },
            error(err) {
                console.log('Error', err);
            }
        });
        console
    },
    getTechs() {
        $.ajax({
            url: '/api/technicians',
            type: 'GET',
            data: {
                location_id: modal.data.location_id
            },
            success(response) {
                modal.populateTechs(response);
            },
            error(err) {
                console.log('Error', err);
            }
        });
    },
    populateTechs(techs) {
        console.log('Techs:', modal.data, techs);
        let select = $('#technician-edit');
        techs.forEach(function (tech) {
            select.append(`<option value="${tech.value}">${tech.label}</option>`);
        });
        select.combobox({
            select: function (event, ui) {
                let tech = ui.item.value
                $.ajax({
                    url: '/api/job-types',
                    type: 'GET',
                    success(response) {
                        modal.populateJobTypes(response);
                    },
                    error(err) {
                        console.log('Error:', err);
                    }

                });
            }
        });
        this.getJobTypes();
    },
    getJobTypes() {
        console.log('get types');
        $.ajax({
            url: '/api/job-types',
            type: 'GET',
            success(response) {
                modal.populateJobTypes(response);
            },
            error(err) {
                console.log('Error', err);
            }
        });
    },
    populateJobTypes(types) {
        console.log('populate types');
        let select = $('#job-type-edit');
        select.empty();
        types.forEach(function (type) {
            select.append(`<option value="${type.value}">${type.label}</option>`)
        });
        select.combobox();
        this.fillModalData();
    },
    fillModalData() {
        console.log('Fill Data:', modal.data);
        let date = $('#date-edit');
        let location = $('#location-edit');
        let technician = $('#technician-edit');
        let jobType = $('#job-type-edit');
        let jobName = $('#job-name-edit');
        let comment = $('#comment-edit');
        let hours = $('#hours-edit');
        date.val(modal.data.log_date);
        location.find(`option[value="${modal.data.location_id}"]`).attr('selected', true);
        technician.find(`option[value="${modal.data.technician_id}"]`).attr('selected', true);
        jobType.find(`option[value="${modal.data.job_type}"]`).attr('selected', true);
        jobName.val(modal.data.job_name);
        comment.html(modal.data.job_comment);
        hours.val(modal.data.log_hours);
        $('#edit-modal').addClass('visible');
    },
    submitForm(input) {
        $.ajax({
            url: `/time-logs/${modal.data.record_no}`,
            type: 'PUT',
            data: input,
            success(response) {
                modal.updateRow(response)
            },
            error(err) {
                console.log('Error', err);
            }
        })
    },
    updateRow(data) {
        let row = $(`tr#record-${data.record_no}`);
        if(row.length == 0) {
            row = $(`tr#record-${data.record_no_source}`);
            row.attr('id', `record-${data.record_no}`);
            row.find('.edit-button').data('record', data.record_no);
        }
        row.find('.date').html(moment(data.log_date).format('M/D/Y'));
        row.find('.location').html(data.loc_short_name);
        row.find('.technician').html(data.technician_name);
        row.find('.job-type').html(data.job_type);
        row.find('.job-name').html(data.job_name);
        row.find('.hours').html(data.log_hours);
        row.find('.comment').html(data.job_comment);
        form.recalculateTotal();
        $('#edit-modal').removeClass('visible');
    }
}
modal.init();

const identify = {
    init() {
        $('form[name="identify"]').on('submit', function (e) {
            e.preventDefault()
            let input = $(this).serialize()
            identify.submitForm(input)
        })
    },
    submitForm(input) {
        $.ajax({
            url: '/identify',
            type: 'POST',
            data: input,
            success() {
                identify.hidePrompt()
            },
            error(err) {
                console.log('Error', err);
            }
        })
    },
    hidePrompt() {
        $('#identify').removeClass('visible');
    }
}
if ($('#identify').length) {
    identify.init()
}