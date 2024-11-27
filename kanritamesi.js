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
    var checkboxContainer = document.getElementById("link-veggie1");
    // 現在の表示状態を確認し、トグル（表示/非表示）する
    if (checkboxContainer.style.display === "none") {
        checkboxContainer.style.display = "block";
    } else {
        checkboxContainer.style.display = "none";
    }
});




event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-fruits1");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }

document.getElementById("fruitsLink2").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-fruits2");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});
document.getElementById("fruitsLink3").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-fruits3");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});
document.getElementById("fruitsLink4").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-fruits4");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});
document.getElementById("fruitsLink5").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-fruits5");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});






document.getElementById("meatLink1").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-meat1");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});
document.getElementById("meatLink2").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-meat2");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});
document.getElementById("meatLink3").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-meat3");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});
document.getElementById("meatLink4").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-meat4");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});
document.getElementById("meatLink5").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-meat5");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});





document.getElementById("fishLink1").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-fish1");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});

document.getElementById("fishLink2").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-fish2");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});

document.getElementById("fishLink3").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-fish3");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});

document.getElementById("fishLink4").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-fish4");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});

document.getElementById("fishLink5").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-fish5");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});

document.getElementById("fishLink6").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-fish6");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});

document.getElementById("carbohyLink1").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-carbohy1");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});
document.getElementById("carbohyLink2").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-carbohy2");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});
document.getElementById("carbohyLink3").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-carbohy3");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});
document.getElementById("carbohyLink4").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("link-carbohy4");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});
