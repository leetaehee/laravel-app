function initBirthDatePicker(selector, options = {}) 
{
    return flatpickr(selector, {
      dateFormat: 'Y-m-d',
      minDate: '1950-01-01',
      maxDate: 'today',
      defaultDate: '1990-01-01',
      showMonths: 3,
      ...options
    });
}
