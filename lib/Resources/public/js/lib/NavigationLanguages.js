ag.ns("ag.app");

/*
    expects a list of objects, each describing a languange version, e.g.

    {
        url : "/en",
        name : "english",
        isCurrent : false
    }
 */

ag.app.NavigationLanguages = function(languages)
{
    if (languages.length > 1)
    {
        this.extend(this, ag.ui.tool.tpl("ag-app-page", ".languages"));

        var list = this.find("ul"),
            stateManager = ag.srv("state"),
            broker = ag.srv("broker");

        Object.keys(languages).forEach(function(name){
            var
            entry = languages[name],
            li = ag.ui.tool.tpl("ag-app-page", ".language"),
            link = li.find("a").attr("href", entry.url).text(entry.name).addClass(entry.isCurrent ? "current" : "");

            broker.sub(
                "ag.state.init ag.state.change ag.state.update",
                function(state, hash) { link.attr("href", entry.url + hash); }
            );

            link.attr("href", entry.url + stateManager.getCurrentHash());

            list.append(li);
        });
    }
};

ag.app.NavigationLanguages.prototype = Object.create(ag.app.NavigationItem.prototype);
