document.addEventListener("DOMContentLoaded", () => {
    const nodeList = document.querySelectorAll(".js-text-hover-rotate");
    const maxLength = Math.max(...[...Array(nodeList.length)].map((_v, i) => nodeList[i].innerText.length));

    const style = document.createElement("style");
    let styleText = ".js-text-hover-rotate span{transform:rotateY(0deg);display:inline-block;transition:0.5s;}";
    for (let i = 0; i < maxLength; i++) {
        styleText += `.header__nav-item a:hover .js-text-hover-rotate-${i}{transform:rotateY(360deg);transition-delay:${i / 20}s;}`;
    }
    style.innerText = styleText;
    document.getElementsByTagName("head")[0].append(style);

    nodeList.forEach(node => {
        const text = node.innerText.split("");
        node.innerText = "";
        text.forEach((v, i) => {
            const span = document.createElement("span");
            span.innerText = v;
            span.setAttribute("class", `js-text-hover-rotate-${i}`);
            node.appendChild(span);
        });
    });
});