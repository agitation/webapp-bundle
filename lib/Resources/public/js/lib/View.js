ag.ns("ag.app");

(function(){

var View = function(blocks)
{
    ag.ui.ctxt.View.call(this, blocks);

    this.header = this.find("header");
    this.body = this.find("article");
    this.footer = this.find("footer");
};

View.prototype = Object.create(ag.ui.ctxt.View.prototype);

View.prototype.nodify = function()
{
    this.extend(this, ag.u.tpl("ag-app-page", ".view"));
};

View.prototype.attachBlocks = function()
{
    var self = this;

    Object.keys(this.blocks).forEach(function(name){
        var
            block = self.blocks[name],
            target = self.body;

        if (block instanceof ag.app.Header)
            target = self.header;
        else if (block instanceof ag.app.Footer)
            target = self.footer;

        target.append(block);
    });
};

ag.app.View = View;

})();
