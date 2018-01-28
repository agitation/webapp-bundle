$(document).ready(function() {
    var ind = new ag.ui.elem.OverlayIndicator(window),
        msgH = new ag.ui.elem.ModalMessageHandler();

    ag.srv("messageHandler", msgH);
    ag.srv("indicator", ind);
    ag.srv("api", new ag.api.Api(ind, msgH));

    ag.srv("nav", new ag.app.Navigation({
        lang : new ag.app.NavigationLanguages(ag.cfg.languages)
    }));
});
