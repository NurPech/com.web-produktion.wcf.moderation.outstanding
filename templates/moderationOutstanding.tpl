{include file='documentHeader'}

<head>
	<title>{lang}wcf.moderation.outstanding{/lang} - {PAGE_TITLE|language}</title>
	
	{include file='headInclude'}
	
	<script type="text/javascript" src="{@$__wcf->getPath()}js/WCF.Moderation.js"></script>
	<script type="text/javascript" src="{@$__wcf->getPath()}js/WCF.Moderation.Outstanding{if !ENABLE_DEBUG_MODE}.min{/if}.js"></script>
	<script type="text/javascript">
		//<![CDATA[
		$(function() {
			new WCF.Moderation.Outstanding.Management({@$queue->queueID}, '{link controller='ModerationList'}{/link}');
			
			WCF.Language.addObject({
				'wcf.moderation.outstanding.markAsDoneContent.confirmMessage': '{lang}wcf.moderation.outstanding.markAsDoneContent.confirmMessage{/lang}'
			});
		});
		//]]>
	</script>
</head>

<body id="tpl{$templateName|ucfirst}">

{include file='header' sidebarOrientation='left'}

<header class="boxHeadline">
	<hgroup>
		<h1>{lang}wcf.moderation.outstanding{/lang}</h1>
	</hgroup>
</header>

{include file='userNotice'}

<div class="contentNavigation">
	<nav>
		<ul>
			<li><a href="{link controller='ModerationList'}{/link}" class="button"><span class="icon icon16 icon-list"></span> <span>{lang}wcf.moderation.moderation{/lang}</span></a></li>
			
			{event name='contentNavigationButtonsTop'}
		</ul>
	</nav>
</div>

<form method="post" action="{link controller='ModerationOutstanding' id=$queue->queueID}{/link}" class="container containerPadding marginTop">
	<fieldset>
		<legend>{lang}wcf.moderation.outstanding.details{/lang}</legend>
		
		<dl>
			<dt>{lang}wcf.global.objectID{/lang}</dt>
			<dd>{#$queue->queueID}</dd>
		</dl>
		{if $queue->lastChangeTime}
			<dl>
				<dt>{lang}wcf.moderation.lastChangeTime{/lang}</dt>
				<dd>{@$queue->lastChangeTime|time}</dd>
			</dl>
		{/if}
		
		{event name='outstandingDetails'}
		
		<dl>
			<dt>{lang}wcf.moderation.comment{/lang}</dt>
			<dd><textarea name="comment" rows="4" cols="40">{$comment}</textarea></dd>
		</dl>
		
		<div class="formSubmit">
			<input type="submit" value="{lang}wcf.global.button.submit{/lang}" />
		</div>
	</fieldset>
</form>

<fieldset class="marginTop">
	<legend>{lang}wcf.moderation.outstanding.content{/lang}</legend>
	
	<div>
		{@$outstandingContent}
	</div>
</fieldset>

<div class="contentNavigation">
	<nav>
		<ul>
			<li class="jsOnly"><button id="markAsDoneContent">{lang}wcf.moderation.outstanding.markAsDoneContent{/lang}</button></li>
			<li><a href="{link controller='ModerationList'}{/link}" class="button"><span class="icon icon16 icon-list"></span> <span>{lang}wcf.moderation.moderation{/lang}</span></a></li>
			
			{event name='contentNavigationButtonsBottom'}
		</ul>
	</nav>
</div>

{include file='footer'}

</body>
</html>