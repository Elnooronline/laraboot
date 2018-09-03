import post from './post';
import swal from 'sweetalert2';

$(document).on('click', '.form-confirm', function (e) {
  const href = $(this).attr('href');
  const formId = $(this).data('form');
  const method = $(this).data('method');
  const title = $(this).data('title') || 'Are you sure do you want to perform this action?';
  const text = $(this).data('text') || 'You cannot undo this action!';
  const type = $(this).data('type') || 'warning';
  const confirmButtonText = $(this).data('confirm-text') || 'Yes!';
  const cancelButtonText = $(this).data('cancel-text') || 'Cancel';
  const confirmButtonColor = $(this).data('confirm-color') || '#DD6B55';
  const csrfToken = document.head.querySelector('meta[name="csrf-token"]');

  swal({
    title,
    text,
    type,
    showCancelButton: true,
    confirmButtonColor,
    confirmButtonText,
    cancelButtonText,
  }).then(() => {
    if (formId) {
      $('#' + formId).submit();
    } else {
      post(href, {
        _token: csrfToken,
        _method: method,
      }, 'post');
    }
  });

  // prevent defult action from being executed.
  e.preventDefault();
});
