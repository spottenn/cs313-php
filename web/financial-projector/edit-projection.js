//let entries = <?php //echo json_encode($entries);?>//;
//let bankAccounts = <?php //echo json_encode($bankAccounts);?>//;
$(function () {
    $(".date-input").datepicker();
    $(".date-input").datepicker("setDate", "today");

});

function resetHiddens() {
    $('#repeats-span').hide();
    $('#ends-span').hide();
    $('#income-or-expense-div').hide();
}

function hideCorrectDivs() {
    let type = $('#type').val()
    if (type === 'expense' || type === 'income') {
        $('#income-or-expense-div').show();
    } else {
        $('#income-or-expense-div').hide();
    }
    if ($('#repeats-checkbox:checked').length == 1) {
        $('#repeats-span').show();
    } else {
        $('#repeats-span').hide();
    }
    if ($('#ends-checkbox:checked').length == 1) {
        $('#ends-span').show();
    } else {
        $('#ends-span').hide();
    }
}

function deleteEntry(id, entryType) {
    let file = "deleteEntry.php";
    $.ajax({
        url: file,
        type: "post",
        data: {
            entryId: id,
            entryType: entryType,
        },
        success: function (response) {
            $('#' + id + '-tr').remove();
        }
    })

}

function editEntry(id) {
    let file = "controller.php";
    $.ajax({
        url: file,
        type: "post",
        data: {
            action: "getEditEntryDiv",
            entryId: id
        },
        success: function (response) {
            $('#' + id + '-tr').remove();
        }
    })
}