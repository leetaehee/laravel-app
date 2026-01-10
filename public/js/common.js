function initBirthDatePicker(selector, options = {}) 
{
    const input = document.querySelector(selector);
    const baseOptions = {
      dateFormat: 'Y-m-d',
      minDate: '1950-01-01',
      maxDate: 'today',
      defaultDate: '1990-01-01',
      showMonths: 3,
      ...options
    };

    if (input && input.value) {
      baseOptions.defaultDate = input.value;
    }

    return flatpickr(selector, baseOptions);
}
