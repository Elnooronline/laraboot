$('input, textarea').on('invalid', () => {
  let tabId = $('input:invalid, textarea:invalid').eq(0).closest('[role=tabpanel]').attr('id');
  $(`a[aria-controls="${tabId}"]`).click();
});