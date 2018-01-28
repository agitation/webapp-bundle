ag.ns("ag.app");

(function(){

var NavigationLogout = function()
{
    this.extend(this, ag.ui.tool.tpl("ag-app-page", ".profile"));

    this.find(".logout").click(function(){
        ag.srv("api").doCall("app.v1/Session.logout", null, function(result, status){
            if (status === 200)
            {
                // show an extra indicator so it keeps running until the page actually reloads
                ag.srv("indicator").start();
                location.reload();
            }
        });
    });
};

NavigationLogout.prototype = Object.create(ag.app.NavigationItem.prototype);

ag.app.NavigationLogout = NavigationLogout;

})();
