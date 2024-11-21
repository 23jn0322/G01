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
  
  // メニュー開閉制御
  hamburger.addEventListener("click", (e) => { 
    e.currentTarget.classList.toggle(CLASS);
    menu.classList.toggle(CLASS);
    if (flg) {// flgの状態で制御内容を切り替え
      backgroundFix(false);
      hamburger.setAttribute("aria-expanded", "false");
      hamburger.focus();
      flg = false;
    } else {
      backgroundFix(true);
      hamburger.setAttribute("aria-expanded", "true");
      flg = true;
    }
  });
  window.addEventListener("keydown", () => {　//escキー押下でメニューを閉じられるように
    if (event.key === "Escape") {
      hamburger.classList.remove(CLASS);
      menu.classList.remove(CLASS);
  
      backgroundFix(false);
      hamburger.focus();
      hamburger.setAttribute("aria-expanded", "false");
      flg = false;
    }
  });
  
  // メニュー内アコーディオン制御
  accordionTrigger.forEach((item) => {
    item.addEventListener("click", (e) => {
      e.currentTarget.classList.toggle(CLASS);
      e.currentTarget.nextElementSibling.classList.toggle(CLASS);
      if (accordionFlg) {
        e.currentTarget.setAttribute("aria-expanded", "false");
        accordionFlg = false;
      } else {
        e.currentTarget.setAttribute("aria-expanded", "true");
        accordionFlg = true;
      }
    });
  
  });
  
  // フォーカストラップ制御
  focusTrap.addEventListener("focus", (e) => {
    hamburger.focus();
  });

  document.getElementById("veggiesLink1").addEventListener("click", function(event) {
    event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
    
    // チェックボックスのコンテナを表示
    var checkboxContainer = document.getElementById("chk-veggie1");
    
    // 現在の表示状態を確認し、トグル（表示/非表示）する
    if (checkboxContainer.style.display === "none") {
        checkboxContainer.style.display = "block";
    } else {
        checkboxContainer.style.display = "none";
    }
});
document.getElementById("veggiesLink2").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("chk-veggie2");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});
document.getElementById("veggiesLink3").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("chk-veggie3");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});
document.getElementById("veggiesLink4").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("chk-veggie4");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});
document.getElementById("veggiesLink5").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("chk-veggie5");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});
document.getElementById("veggiesLink6").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("chk-veggie6");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});
document.getElementById("veggiesLink7").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("chk-veggie7");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});




document.getElementById("fruitsLink1").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("chk-fruits1");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});
document.getElementById("fruitsLink2").addEventListener("click", function(event) {
  event.preventDefault(); // リンクのデフォルト動作をキャンセル（ページ遷移防止）
  
  // チェックボックスのコンテナを表示
  var checkboxContainer = document.getElementById("chk-fruits2");
  
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
  var checkboxContainer = document.getElementById("chk-fruits3");
  
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
  var checkboxContainer = document.getElementById("chk-fruits4");
  
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
  var checkboxContainer = document.getElementById("chk-meat1");
  
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
  var checkboxContainer = document.getElementById("chk-meat2");
  
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
  var checkboxContainer = document.getElementById("chk-meat3");
  
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
  var checkboxContainer = document.getElementById("chk-meat4");
  
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
  var checkboxContainer = document.getElementById("chk-meat5");
  
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
  var checkboxContainer = document.getElementById("chk-fish1");
  
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
  var checkboxContainer = document.getElementById("chk-fish2");
  
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
  var checkboxContainer = document.getElementById("chk-fish3");
  
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
  var checkboxContainer = document.getElementById("chk-fish4");
  
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
  var checkboxContainer = document.getElementById("chk-fish5");
  
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
  var checkboxContainer = document.getElementById("chk-fish6");
  
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
  var checkboxContainer = document.getElementById("chk-carbohy1");
  
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
  var checkboxContainer = document.getElementById("chk-carbohy2");
  
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
  var checkboxContainer = document.getElementById("chk-carbohy3");
  
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
  var checkboxContainer = document.getElementById("chk-carbohy4");
  
  // 現在の表示状態を確認し、トグル（表示/非表示）する
  if (checkboxContainer.style.display === "none") {
      checkboxContainer.style.display = "block";
  } else {
      checkboxContainer.style.display = "none";
  }
});
