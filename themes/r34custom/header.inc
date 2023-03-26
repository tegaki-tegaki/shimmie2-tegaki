<table class="headbox">
	<tr>
		<td colspan="4" id="big-logo">
			<a class="vis-desktop" href="index.php?q=/post/list"><img alt="logo" src="/themes/r34custom/rule34_logo_top.png" style="height: 104px;"/></a>
		</td>
	</tr>

	<tr>
		<form action='/post/list' method='GET' id="barbot">
			<td id="nav-toggle">
				<a style="font-size: 2em;" onclick="toggleNav();">&#9776;</a>
			</td>
			<td id="mini-logo">
				<a class="vis-mobile" href="index.php?q=/post/list"><img alt="logo" src="/themes/r34custom/rule34_logo_top.png" style="height: 34px;"/></a>
			</td>
			<td>
				<input name='search' size="45" type='text' placeholder='Search' autocomplete='off' class='autocomplete_tags' value="<?=$query;?>"/>
			</td>
			<td width="100">
				<input type='submit' value='Find' id="submit" style="border: 1px solid #888; height: 34px; border-radius: 2px; background: #EEE;"/>
			</td>
		</form>
	</tr>

	<tr>
		<td colspan="4">
<div id="menuh-container">
<div id="menuh">

	<ul>
		<li><a href="/" class="top_parent">Main &#9660;</a>
		<ul>
			<li><a href="/" class="sub_option">Home page</a></li>
			<li><a href="index.php?q=/comment/list" class="sub_option">Comments</a></li>
			<li><a href="index.php?q=/tags" class="sub_option">Tags</a></li>
			<li><a href="index.php?q=/pool/list" class="sub_option">Pools</a></li>
			<li><a href="index.php?q=/wiki" class="sub_option">Wiki</a></li>
		</ul>
		</li>
	</ul>
</div>
</div>

		</td>
	</tr>
</table>
