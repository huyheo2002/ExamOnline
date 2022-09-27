
let selectCategory = $('select[name="category_id"]');
let examContainer = $('#exams');
$(selectCategory).change(() => {
  $.ajax({
    url: ajaxUrl ?? "",
    method: "POST",
    data: {
      category_id: $(selectCategory).val(),
    },
    success: function (data) {
      let exams = $.parseJSON(data);
      $(examContainer).html('');
      $.each(exams, (index, exam) => {
        $(examContainer).append(`
          <li><a href="${showUrl + '&id=' + exam.id}">${exam.name}</a></li>
        `);
      });
    }
  })
});