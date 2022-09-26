
let selectCategory = $('select[name="category_id"]');
let questionContainer = $('#questions');
$(selectCategory).change(() => {
  $.ajax({
    url: url ?? "",
    method: "POST",
    data: {
      category_id: $(selectCategory).val(),
    },
    success: function (data) {
      let questions = $.parseJSON(data);
      $(questionContainer).html('');
      $.each(questions, (index, question) => {
        $(questionContainer).append(`
          <div class="check__wrap">
            <input class="check_cb" type="checkbox" name="question_ids[]" id="chk_question_${question.id}" value="${question.id}">
            <label for="chk_question_${question.id}" class="check__name">${question.content}</label>
          </div>
        `);
      });
    }
  })
});