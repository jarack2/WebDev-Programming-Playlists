$('.card').click(function() {
  const topicname = ".card-form-" + $(this).data("value");
  $(topicname).submit();
});