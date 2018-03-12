ag.s.msg = new ag.ui.elem.ModalMessageHandler();

ag.s.nav = new ag.app.Navigation({
    pages : new ag.app.NavigationPages({ "/" : { name : ag.intl.x("home page", "Home") } }),
    lang : new ag.app.NavigationLanguages(ag.cfg.languages)
});
