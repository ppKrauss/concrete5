<? defined('C5_EXECUTE') or die("Access Denied."); ?>

<?
if (!is_array($messages)) {
	$messages = array();
}
$u = new User();
$ui = UserInfo::getByID($u->getUserID());
?>

<? if ($displayForm) { ?>

<h4><?=t('Add Message')?></h4>

<? if ($enablePosting) { ?>
	<div class="ccm-conversation-add-new-message">
		<form method="post">
		<div class="ccm-conversation-avatar"><? print Loader::helper('concrete/avatar')->outputUserAvatar($ui)?></div>
		<div class="ccm-conversation-message-form">
			<div class="ccm-conversation-errors alert alert-error"></div>
			<textarea name="cnvMessageBody"></textarea>
			<button type="button" data-post-parent-id="0" data-submit="conversation-message" class="pull-right btn btn-submit btn-small"><?=t('Post')?> <i class="icon-bullhorn"></i></button>
		</div>
		</form>
	</div>

	<div class="ccm-conversation-add-reply">
		<form method="post">
		<div class="ccm-conversation-avatar"><? print Loader::helper('concrete/avatar')->outputUserAvatar($ui)?></div>
		<div class="ccm-conversation-message-form">
			<div class="ccm-conversation-errors alert alert-error"></div>
			<textarea name="cnvMessageBody"></textarea>
			<button type="button" data-submit="conversation-message" class="pull-right btn btn-submit btn-small"><?=t('Post')?> <i class="icon-bullhorn"></i></button>
		</div>
		</form>
	</div>
<? } else { ?>
	<p><?=t('Adding new posts is disabled for this conversation.')?></p>
<? } ?>

<? } ?>

<div class="ccm-conversation-message-list">

	<div class="ccm-conversation-messages-header">
		<select class="ccm-sort-conversations" data-sort="conversation-message-list">
			<option value="date_asc" <? if ($orderBy == 'date_asc') { ?>selected="selected"<? } ?>><?=t('Earliest First')?></option>
			<option value="date_desc" <? if ($orderBy == 'date_desc') { ?>selected="selected"<? } ?>><?=t('Most Recent First')?></option>
		</select>

		<? Loader::element('conversation/count_header', array('conversation' => $conversation))?>
	</div>


	<div class="ccm-conversation-no-messages well well-small" <? if (count($messages) > 0) { ?>style="display: none" <? } ?>><?=t('No messages in this conversation.')?></div>

	<div class="ccm-conversation-messages">

	<? foreach($messages as $m) {
		Loader::element('conversation/message', array('message' => $m, 'enablePosting' => $enablePosting));
	} ?>
	
	</div>

</div>


</div>
