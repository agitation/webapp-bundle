$(document).ready(function(){

var indicator = new ag.app.OverlayIndicator(window),

    form = new ag.app.Form({
            email : new ag.ui.elem.FormRow(ag.intl.t("E-mail"), new ag.ui.field.Text()),
            password : new ag.ui.elem.FormRow(ag.intl.t("Password"), new ag.ui.field.Password()),
        },

        "app.v1/Session.login",

        function(res, status) {
            if (status === 200)
                location.reload();
            else
                indicator.halt();
        },

        ag.u.tpl("ag-app-form", ".form-footer.newpass")
    ),

    page = new ag.app.Page(
        ag.s.nav,
        new ag.ui.ctxt.Views({
            login : new ag.app.View({
                h : new ag.app.Title(ag.intl.t("Login required")),
                c : new ag.ui.ctxt.Container({
                    form : form
                })
            })
        })
    );

form.on("submit", function(){
    // show an indicator and keep it running until the page reloads
    indicator.start();
});

page.ignoreInvalidState = true;

page.initialize();

});
