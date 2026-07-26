$(function () {
	"use strict";

	// Scrollbars
	new PerfectScrollbar(".header-message-list");
	new PerfectScrollbar(".header-notifications-list");

	// Search bar
	$(".mobile-search-icon").on("click", function () {
		$(".search-bar").addClass("full-search-bar");
	});
	$(".search-close").on("click", function () {
		$(".search-bar").removeClass("full-search-bar");
	});

	// Sidebar toggle (mobile)
	$(".mobile-toggle-menu").on("click", function () {
		$(".wrapper").addClass("toggled");
	});

	// Sidebar collapse/expand
	$(".toggle-icon").on("click", function () {
		if ($(".wrapper").hasClass("toggled")) {
			$(".wrapper").removeClass("toggled");
			$(".sidebar-wrapper").unbind("hover");
		} else {
			$(".wrapper").addClass("toggled");
			$(".sidebar-wrapper").hover(
				function () {
					$(".wrapper").addClass("sidebar-hovered");
				},
				function () {
					$(".wrapper").removeClass("sidebar-hovered");
				}
			);
		}
	});

	// Back to top
	$(window).on("scroll", function () {
		$(this).scrollTop() > 300 ? $(".back-to-top").fadeIn() : $(".back-to-top").fadeOut();
	});
	$(".back-to-top").on("click", function () {
		$("html, body").animate({ scrollTop: 0 }, 600);
		return false;
	});

	// Activate metismenu link
	(function () {
		var current = window.location;
		var $link = $(".metismenu li a").filter(function () {
			return this.href == current;
		});
		var $li = $link.parent("li").addClass("mm-active");
		while ($li.length && $li.is("li")) {
			var $ul = $li.parent("ul").addClass("mm-show");
			$li = $ul.parent("li").addClass("mm-active");
			if (!$li.length) break;
		}
	})();
	$("#menu").metisMenu();

	// Chat / Email wrappers
	$(".chat-toggle-btn").on("click", function () {
		$(".chat-wrapper").toggleClass("chat-toggled");
	});
	$(".chat-toggle-btn-mobile").on("click", function () {
		$(".chat-wrapper").removeClass("chat-toggled");
	});
	$(".email-toggle-btn").on("click", function () {
		$(".email-wrapper").toggleClass("email-toggled");
	});
	$(".email-toggle-btn-mobile").on("click", function () {
		$(".email-wrapper").removeClass("email-toggled");
	});

	// Compose mail
	$(".compose-mail-btn").on("click", function () {
		$(".compose-mail-popup").show();
	});
	$(".compose-mail-close").on("click", function () {
		$(".compose-mail-popup").hide();
	});

	// Theme Customizer (persist + combine: mode + header + sidebar)
	var UERD_THEME_KEYS = {
		mode: "uerd_admin_theme_mode",
		header: "uerd_admin_header_color",
		sidebar: "uerd_admin_sidebar_bg"
	};
	var UERD_THEME_MODES = ["light-theme", "dark-theme", "semi-dark", "minimal-theme"];
	var UERD_HEADER_COLORS = ["headercolor1", "headercolor2", "headercolor3", "headercolor4", "headercolor5", "headercolor6", "headercolor7", "headercolor8"];
	var UERD_SIDEBAR_COLORS = ["sidebarcolor1", "sidebarcolor2", "sidebarcolor3", "sidebarcolor4", "sidebarcolor5", "sidebarcolor6", "sidebarcolor7", "sidebarcolor8"];

	function uerdStorageAvailable() {
		try {
			var key = "__uerd_ls_test__";
			window.localStorage.setItem(key, "1");
			window.localStorage.removeItem(key);
			return true;
		} catch (e) {
			return false;
		}
	}

	function uerdGetStoredValue(key, allowed) {
		if (!uerdStorageAvailable()) return null;
		var value = window.localStorage.getItem(key);
		return allowed.indexOf(value) !== -1 ? value : null;
	}

	function uerdSetStoredValue(key, value) {
		if (!uerdStorageAvailable()) return;
		window.localStorage.setItem(key, value);
	}
	function uerdRemoveStoredValue(key) {
		if (!uerdStorageAvailable()) return;
		window.localStorage.removeItem(key);
	}

	var uerdThemeMode = uerdGetStoredValue(UERD_THEME_KEYS.mode, UERD_THEME_MODES) || "light-theme";
	var uerdHeaderColor = uerdGetStoredValue(UERD_THEME_KEYS.header, UERD_HEADER_COLORS);
	var uerdSidebarColor = uerdGetStoredValue(UERD_THEME_KEYS.sidebar, UERD_SIDEBAR_COLORS);

	function uerdApplyTheme() {
		var $html = $("html");

		$html.removeClass(UERD_THEME_MODES.join(" ")).addClass(uerdThemeMode);

		$html.removeClass("color-header").removeClass(UERD_HEADER_COLORS.join(" "));
		if (uerdHeaderColor) $html.addClass("color-header").addClass(uerdHeaderColor);

		$html.removeClass("color-sidebar").removeClass(UERD_SIDEBAR_COLORS.join(" "));
		if (uerdSidebarColor) $html.addClass("color-sidebar").addClass(uerdSidebarColor);

		$("#lightmode").prop("checked", uerdThemeMode === "light-theme");
		$("#darkmode").prop("checked", uerdThemeMode === "dark-theme");
		$("#semidark").prop("checked", uerdThemeMode === "semi-dark");
		$("#minimaltheme").prop("checked", uerdThemeMode === "minimal-theme");
	}

	function uerdSetThemeMode(mode) {
		uerdThemeMode = mode;
		uerdSetStoredValue(UERD_THEME_KEYS.mode, mode);
		uerdApplyTheme();
	}
	function uerdSetHeaderColor(colorClass) {
		uerdHeaderColor = colorClass;
		uerdSetStoredValue(UERD_THEME_KEYS.header, colorClass);
		uerdApplyTheme();
	}
	function uerdSetSidebarColor(colorClass) {
		uerdSidebarColor = colorClass;
		uerdSetStoredValue(UERD_THEME_KEYS.sidebar, colorClass);
		uerdApplyTheme();
	}

	function uerdResetThemeCustomizer() {
		uerdThemeMode = "light-theme";
		uerdHeaderColor = null;
		uerdSidebarColor = null;
		uerdRemoveStoredValue(UERD_THEME_KEYS.mode);
		uerdRemoveStoredValue(UERD_THEME_KEYS.header);
		uerdRemoveStoredValue(UERD_THEME_KEYS.sidebar);
		uerdApplyTheme();
	}

	// Apply persisted values on load
	uerdApplyTheme();

	// Switcher toggle
	$(".switcher-btn").on("click", function () {
		$(".switcher-wrapper").toggleClass("switcher-toggled");
	});
	$(".close-switcher").on("click", function () {
		$(".switcher-wrapper").removeClass("switcher-toggled");
	});
	$("#uerd-theme-reset").on("click", function () {
		uerdResetThemeCustomizer();
	});

	// Theme mode radios
	$("#lightmode").on("click", function () { uerdSetThemeMode("light-theme"); });
	$("#darkmode").on("click", function () { uerdSetThemeMode("dark-theme"); });
	$("#semidark").on("click", function () { uerdSetThemeMode("semi-dark"); });
	$("#minimaltheme").on("click", function () { uerdSetThemeMode("minimal-theme"); });

	// Header colors
	$("#headercolor1").on("click", function () { uerdSetHeaderColor("headercolor1"); });
	$("#headercolor2").on("click", function () { uerdSetHeaderColor("headercolor2"); });
	$("#headercolor3").on("click", function () { uerdSetHeaderColor("headercolor3"); });
	$("#headercolor4").on("click", function () { uerdSetHeaderColor("headercolor4"); });
	$("#headercolor5").on("click", function () { uerdSetHeaderColor("headercolor5"); });
	$("#headercolor6").on("click", function () { uerdSetHeaderColor("headercolor6"); });
	$("#headercolor7").on("click", function () { uerdSetHeaderColor("headercolor7"); });
	$("#headercolor8").on("click", function () { uerdSetHeaderColor("headercolor8"); });

	// Sidebar background colors
	$("#sidebarcolor1").on("click", function () { uerdSetSidebarColor("sidebarcolor1"); });
	$("#sidebarcolor2").on("click", function () { uerdSetSidebarColor("sidebarcolor2"); });
	$("#sidebarcolor3").on("click", function () { uerdSetSidebarColor("sidebarcolor3"); });
	$("#sidebarcolor4").on("click", function () { uerdSetSidebarColor("sidebarcolor4"); });
	$("#sidebarcolor5").on("click", function () { uerdSetSidebarColor("sidebarcolor5"); });
	$("#sidebarcolor6").on("click", function () { uerdSetSidebarColor("sidebarcolor6"); });
	$("#sidebarcolor7").on("click", function () { uerdSetSidebarColor("sidebarcolor7"); });
	$("#sidebarcolor8").on("click", function () { uerdSetSidebarColor("sidebarcolor8"); });
});