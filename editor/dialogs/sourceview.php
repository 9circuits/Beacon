<script type="text/javascript">
var gid = getVar('id');

var style= '<body>';
var text = style+iframe.document.body.innerHTML+'</body>';

text = encodeURIComponent(text);

var myAjax = new Ajax.Request(
"ajax/html2guide.php", 
{
    method: 'post', 
    parameters: "id="+gid+"&text="+text, 
    onComplete: function() {
        document.getElementById("confirm").style.display = 'block';
        document.getElementById("loadingGif").style.display = 'none';
        document.getElementById("source").value = myAjax.transport.responseText;
        
        // The editor + modal window is having a funny effect in Safari... For now it's off.
        /*editAreaLoader.init({
        	id: "source"	// id of the textarea to transform		
        	,start_highlight: true	// if start with highlight
        	,allow_resize: "no"
        	,allow_toggle: false
        	,language: "en"
        	,syntax: "brainfuck"	
        });*/
    }
}
);
</script>

<div id="box" style="text-align: center;">
	<p class="header">Source View</p>
    <div id="loadingGif" style="margin: 10px; width: 32px; height: 32px;">
        <table class="form">
            <tr><td><img src="images/loading.gif" width="32px" height="32px" border="none" /></td></tr>
            <tr><td><b>Fetching Data...</b></td></tr>
        </table>
    </div>
    <div id="confirm" style="display:none;">
    <table class="form">
	    <tr><td>
            <textarea id="source" name="text" style="width: 760px; height: 450px;"></textarea>
        </td></tr>

        <tr><td align="center"> <a href="#" id="update" class="lbAction" rel="deactivate">Update</a></td></tr>
    </table>
</div>
