ag.ns("ag.app");

(function(){

var Title = function(text)
{
    this.nodify();
    text !== undefined && this.setText(text);
};

Title.prototype = Object.create(ag.app.Header.prototype);

Title.prototype.nodify = function()
{
    this.extend(this, ag.ui.tool.tpl("ag-app-page", ".title"));
    this.textTarget = this.find("h1");
};

Title.prototype.setText = function(text)
{
    this.titleText = text;
    this.textTarget.text(text);
};

Title.prototype.getText = function()
{
    return this.titleText;
};

ag.app.Title = Title;

})();
