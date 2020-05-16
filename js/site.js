/**
 * confirmation de la suppression 
 * @param url 
 */
function confirm_delete(url) {
    if (confirm("Etes-vous sûr?")) {
        window.location.href = url;
    }
}

/** 
 * Validates that the input string is a valid date formatted as "mm/dd/yyyy"
 * @source : https://stackoverflow.com/questions/6177975/how-to-validate-date-with-format-mm-dd-yyyy-in-javascript
 * @param dateString
 * @return boolean
 */
function is_valid_date(dateString) {
    // First check for the pattern
    if(!/^\d{4}\-\d{1,2}\-\d{1,2}$/.test(dateString))
        return false;

    // Parse the date parts to integers
    var parts = dateString.split("-");
    var day = parseInt(parts[2], 10);
    var month = parseInt(parts[1], 10);
    var year = parseInt(parts[0], 10);

    // Check the ranges of month and year
    if(year < 1000 || year > 3000 || month == 0 || month > 12)
        return false;

    var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

    // Adjust for leap years
    if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
        monthLength[1] = 29;

    // Check the range of the day
    return day > 0 && day <= monthLength[month - 1];
}

/**
 * check if string is valid
 * @param str_  
 * @return boolean
 */
function is_valid_string(str_) {
    //return typeof str_ === 'string' || str_ instanceof String;
    return !/\d{3,}/.test(str_);
}

/**
 * Validate form project
 * @return boolean
 */
function validate_form_project() {
	// 
    if ($("#title").val().trim() == "" || !is_valid_string($("#title").val())) {
        alert("Le titre n'est pas valide!");
        return false;
    }
    //
    if ($("#description").val().trim() == "" || !is_valid_string($("#description").val())) {
        alert("La description n'est pas valide!");
        return false;
    }
    //
    if (!is_valid_date($("#start_date").val())) {
        alert("La date de debut n'est pas valide!");
        return false;
    }
    //
    if (!is_valid_date($("#due_date").val())) {
        alert("La date d'échéance n'est pas valide!");
        return false;
    }
    var date_1 = new Date($("#start_date").val());
    var date_2 = new Date($("#due_date").val());
    if (date_1.getTime() > date_2.getTime()) {
        alert("La date de début doit être inférieur à la date d'échéance!");
        return false;
    }
    return true;
}
