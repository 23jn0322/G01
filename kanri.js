const backgroundFix = (bool) => {
  const scrollingElement = () => {
    const browser = window.navigator.userAgent.toLowerCase();
    if ("scrollingElement" in document) return document.scrollingElement;
    return document.documentElement;
  };

  const scrollY = bool
    ? scrollingElement().scrollTop
    : parseInt(document.body.style.top || "0");

  const fixedStyles = {
    height: "100vh",
    position: "fixed",
    top: `${scrollY * -1}px`,
    left: "0",
    width: "100vw"
  };

  Object.keys(fixedStyles).forEach((key) => {
    document.body.style[key] = bool ? fixedStyles[key] : "";
  });

  if (!bool) {
    window.scrollTo(0, scrollY * -1);
  }
};

// 変数定義
const CLASS = "-active";
let flg = false;
let accordionFlg = false;

let hamburger = document.getElementById("js-hamburger");
let focusTrap = document.getElementById("js-focus-trap");
let menu = document.querySelector(".js-nav-area");
let accordionTrigger = document.querySelectorAll(".js-sp-accordion-trigger");
let accordion = document.querySelectorAll(".js-sp-accordion");



document.getElementById("veggiesLink").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-veggie");
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
      document.getElementById("link-fruits").style.display = "none";
      document.getElementById("link-meat").style.display = "none";
      document.getElementById("link-fish").style.display = "none";
      document.getElementById("link-carbohy").style.display = "none";
  };
});

document.getElementById("fruitsLink").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-fruits");
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
      document.getElementById("link-veggie").style.display = "none";
      document.getElementById("link-meat").style.display = "none";
      document.getElementById("link-fish").style.display = "none";
      document.getElementById("link-carbohy").style.display = "none";
  }
});
document.getElementById("meatLink").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-meat");
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
      document.getElementById("link-veggie").style.display = "none";
      document.getElementById("link-fruits").style.display = "none";
      document.getElementById("link-fish").style.display = "none";
      document.getElementById("link-carbohy").style.display = "none";
  }
});
document.getElementById("fishLink").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-fish");
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
      document.getElementById("link-veggie").style.display = "none";
      document.getElementById("link-meat").style.display = "none";
      document.getElementById("link-fruits").style.display = "none";
      document.getElementById("link-carbohy").style.display = "none";
  }
});
document.getElementById("carbohyLink").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-carbohy");
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
      document.getElementById("link-veggie").style.display = "none";
      document.getElementById("link-meat").style.display = "none";
      document.getElementById("link-fish").style.display = "none";
      document.getElementById("link-fruits").style.display = "none";
  }
});
