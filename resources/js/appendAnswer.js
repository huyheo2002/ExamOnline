let answerCount = 0;
let answersContainer = document.querySelector("#answers");

function refreshAnswers() {
  let answers = answersContainer.querySelectorAll(".check__wrap");
  answers.forEach((answer) => {
    let radioCorrect = answer.querySelector(".check_cb");
    let inputContent = answer.querySelector(".check__name");
    let btnDeleteAnswer = answer.querySelector(".deleteAnswer");
    if (btnDeleteAnswer == null) {
      btnDeleteAnswer = document.createElement("button");
      btnDeleteAnswer.classList.add("deleteAnswer");
      btnDeleteAnswer.innerText = "Xoá";
      answer.appendChild(btnDeleteAnswer);
    }

    radioCorrect.setAttribute("value", `${answerCount}`);
    inputContent.setAttribute("name", `answers[content][${answerCount++}]`);
    btnDeleteAnswer.onclick = (event) => {
      event.preventDefault();

      answer.remove();
      answerCount = 0;
      refreshAnswers();
    }
  });
}

window.onload = () => {
  refreshAnswers();
}

document.querySelector("button#addAnswer").onclick = (event) => {
  event.preventDefault();
  if (answerCount >= 4) return;
  let answer = document.createElement("div");
  answer.classList.add("check__wrap");
  answer.innerHTML = `
    <input class="check_cb" type="radio" name="answers[correct]" value="${answerCount}">
    <textarea class="check__name" name="answers[content][${answerCount++}]"></textarea>
  `;

  let btnDeleteAnswer = document.createElement("button");
  btnDeleteAnswer.classList.add("deleteAnswer");
  btnDeleteAnswer.innerText = "Xoá";
  btnDeleteAnswer.onclick = (event) => {
    event.preventDefault();

    answer.remove();
    answerCount = 0;
    refreshAnswers();
  }

  answer.appendChild(btnDeleteAnswer);
  answersContainer.appendChild(answer);
}