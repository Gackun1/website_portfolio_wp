document.addEventListener("DOMContentLoaded", () => {
  //サンプルのボタン無効
  const sampleButtonList = document.querySelectorAll(".btn-box a");
  for (const sampleButton of sampleButtonList) {
    sampleButton.addEventListener("click", (e) => e.preventDefault());
  }

  //コードを見るボタン
  const moreButtonList = document.querySelectorAll(".btn-more-code");
  for (const moreButton of moreButtonList) {
    moreButton.addEventListener("click", (e) => {
      const codebox = e.currentTarget.parentNode.querySelector(".codebox");
      const buttonIcon = e.currentTarget.parentNode.querySelector(
        ".btn-more-code__icon"
      );
      codebox.classList.toggle("open");
      buttonIcon.classList.toggle("open");
    });
  }

  //コピーボタン
  const copyButtonList = document.querySelectorAll(".codebox__copy");
  for (const copyButton of copyButtonList) {
    copyButton.addEventListener("click", (e) => {
      const copy = e.currentTarget;
      const code = copy.parentNode.parentNode.querySelector("code").textContent;

      //クリップボードへコピー
      navigator.clipboard.writeText(code);

      //テキストを表示
      copy.classList.contains("message")
        ? copy.classList.remove("message")
        : "";
      setTimeout(() => {
        copy.classList.toggle("message");
      }, 0);
    });
  }
});
