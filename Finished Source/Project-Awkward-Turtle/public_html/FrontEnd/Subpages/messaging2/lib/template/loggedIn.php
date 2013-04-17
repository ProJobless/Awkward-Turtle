
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="[LANG_CODE/]" lang="[LANG_CODE/]" dir="[BASE_DIRECTION/]">

<head>
	<meta http-equiv="Content-Type" content="[CONTENT_TYPE/]" />
	<title>[LANG]title[/LANG]</title>
	<style type="text/css">
		body {
			padding:0;
			margin:0;
		}
	</style>
	[STYLE_SHEETS/]
	<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" href="css/ie5-6.css"/>
		<script type="text/javascript">
			var isIElt7 = true;
		</script>
	<![endif]-->
	<script src="js/chat.js" type="text/javascript" charset="UTF-8"></script>
	<script src="js/custom.js" type="text/javascript" charset="UTF-8"></script>
	<script src="js/lang/[LANG_CODE/].js" type="text/javascript" charset="UTF-8"></script>
	<script src="js/config.js" type="text/javascript" charset="UTF-8"></script>
	<script src="js/FABridge.js" type="text/javascript" charset="UTF-8"></script>
	<script type="text/javascript">
		// <![CDATA[
			function toggleContainer(containerID, hideContainerIDs) {
				if(hideContainerIDs) {
					for(var i=0; i<hideContainerIDs.length; i++) {
						ajaxChat.showHide(hideContainerIDs[i], 'none');	
					}
				}		
				ajaxChat.showHide(containerID);
				if(typeof arguments.callee.styleProperty == 'undefined') {
					if(typeof isIElt7 != 'undefined') {
						arguments.callee.styleProperty = 'marginRight';
					} else {
						arguments.callee.styleProperty = 'right';
					}
				}
				var containerWidth = document.getElementById(containerID).offsetWidth;
				if(containerWidth) {
					document.getElementById('chatList').style[arguments.callee.styleProperty] = (containerWidth+28)+'px';	
				} else {
					document.getElementById('chatList').style[arguments.callee.styleProperty] = '20px';
				}				
			}

			function initialize() {
				ajaxChat.updateButton('audio', 'audioButton');
				ajaxChat.updateButton('autoScroll', 'autoScrollButton');
				document.getElementById('bbCodeSetting').checked = ajaxChat.getSetting('bbCode');
				document.getElementById('bbCodeImagesSetting').checked = ajaxChat.getSetting('bbCodeImages');
				document.getElementById('bbCodeColorsSetting').checked = ajaxChat.getSetting('bbCodeColors');
				document.getElementById('hyperLinksSetting').checked = ajaxChat.getSetting('hyperLinks');
				document.getElementById('lineBreaksSetting').checked = ajaxChat.getSetting('lineBreaks');
				document.getElementById('emoticonsSetting').checked = ajaxChat.getSetting('emoticons');
				document.getElementById('autoFocusSetting').checked = ajaxChat.getSetting('autoFocus');
				document.getElementById('maxMessagesSetting').value = ajaxChat.getSetting('maxMessages');
				document.getElementById('wordWrapSetting').checked = ajaxChat.getSetting('wordWrap');
				document.getElementById('maxWordLengthSetting').value = ajaxChat.getSetting('maxWordLength');
				document.getElementById('dateFormatSetting').value = ajaxChat.getSetting('dateFormat');
				document.getElementById('persistFontColorSetting').checked = ajaxChat.getSetting('persistFontColor');
				for(var i=0; i<document.getElementById('audioVolumeSetting').options.length; i++) {
					if(document.getElementById('audioVolumeSetting').options[i].value == ajaxChat.getSetting('audioVolume')) {
						document.getElementById('audioVolumeSetting').options[i].selected = true;
						break;
					}
				}
				ajaxChat.fillSoundSelection('soundReceiveSetting', ajaxChat.getSetting('soundReceive'));
				ajaxChat.fillSoundSelection('soundSendSetting', ajaxChat.getSetting('soundSend'));
				ajaxChat.fillSoundSelection('soundEnterSetting', ajaxChat.getSetting('soundEnter'));
				ajaxChat.fillSoundSelection('soundLeaveSetting', ajaxChat.getSetting('soundLeave'));
				ajaxChat.fillSoundSelection('soundChatBotSetting', ajaxChat.getSetting('soundChatBot'));
				ajaxChat.fillSoundSelection('soundErrorSetting', ajaxChat.getSetting('soundError'));
				document.getElementById('blinkSetting').checked = ajaxChat.getSetting('blink');
				document.getElementById('blinkIntervalSetting').value = ajaxChat.getSetting('blinkInterval');
				document.getElementById('blinkIntervalNumberSetting').value = ajaxChat.getSetting('blinkIntervalNumber');
			}

			ajaxChatConfig.loginChannelID = parseInt('[LOGIN_CHANNEL_ID/]');
			ajaxChatConfig.sessionName = '[SESSION_NAME/]';
			ajaxChatConfig.cookieExpiration = parseInt('[COOKIE_EXPIRATION/]');
			ajaxChatConfig.cookiePath = '[COOKIE_PATH/]';
			ajaxChatConfig.cookieDomain = '[COOKIE_DOMAIN/]';
			ajaxChatConfig.cookieSecure = '[COOKIE_SECURE/]';
			ajaxChatConfig.chatBotName = decodeURIComponent('[CHAT_BOT_NAME/]');
			ajaxChatConfig.chatBotID = '[CHAT_BOT_ID/]';
			ajaxChatConfig.allowUserMessageDelete = parseInt('[ALLOW_USER_MESSAGE_DELETE/]');
			ajaxChatConfig.inactiveTimeout = parseInt('[INACTIVE_TIMEOUT/]');
			ajaxChatConfig.privateChannelDiff = parseInt('[PRIVATE_CHANNEL_DIFF/]');
			ajaxChatConfig.privateMessageDiff = parseInt('[PRIVATE_MESSAGE_DIFF/]');
			ajaxChatConfig.showChannelMessages = parseInt('[SHOW_CHANNEL_MESSAGES/]');
			ajaxChatConfig.messageTextMaxLength = parseInt('[MESSAGE_TEXT_MAX_LENGTH/]');
			ajaxChatConfig.socketServerEnabled = parseInt('[SOCKET_SERVER_ENABLED/]');
			ajaxChatConfig.socketServerHost = decodeURIComponent('[SOCKET_SERVER_HOST/]');
			ajaxChatConfig.socketServerPort = parseInt('[SOCKET_SERVER_PORT/]');
			ajaxChatConfig.socketServerChatID = parseInt('[SOCKET_SERVER_CHAT_ID/]');
		
			ajaxChat.init(ajaxChatConfig, ajaxChatLang, true, true, true, initialize);
		// ]]>
	</script>
</head>

<body>
	<div id="content">
		<div id="headlineContainer">
			<h1>[LANG]title[/LANG]</h1>
		</div>
		<div id="logoutChannelContainer">
  			<input type="button" id="logoutButton" value="[LANG]logout[/LANG]" onclick="ajaxChat.logout();"/>
			<label for="channelSelection">[LANG]channel[/LANG]:</label>
			<select id="channelSelection" onchange="ajaxChat.switchChannel(this.options[this.selectedIndex].value);">[CHANNEL_OPTIONS/]</select>
			<label for="styleSelection">[LANG]style[/LANG]:</label>
			<select id="styleSelection" onchange="ajaxChat.setActiveStyleSheet(ajaxChat.getSelectedStyle());">[STYLE_OPTIONS/]</select>
			<label for="languageSelection">[LANG]language[/LANG]:</label>
			<select id="languageSelection" onchange="ajaxChat.switchLanguage(this.value);">[LANGUAGE_OPTIONS/]</select>
  		</div>
		<div id="statusIconContainer" class="statusContainerOn" onclick="ajaxChat.updateChat(null);"></div>
		<!--[if lt IE 7]>
			<div></div>
		<![endif]-->
		<div id="chatList"></div>
		<div id="inputFieldContainer">
			<textarea id="inputField" rows="1" cols="50" title="[LANG]inputLineBreak[/LANG]" onkeypress="ajaxChat.handleInputFieldKeyPress(event);" onkeyup="ajaxChat.handleInputFieldKeyUp(event);"></textarea>
		</div>
		<div id="submitButtonContainer">
			<span id="messageLengthCounter">0/[MESSAGE_TEXT_MAX_LENGTH/]</span>
			<input type="button" id="submitButton" value="[LANG]messageSubmit[/LANG]" onclick="ajaxChat.sendMessage();"/>
		</div>
		<div id="emoticonsContainer" dir="ltr"></div>
		<div id="bbCodeContainer">
			<input type="button" value="[LANG]bbCodeLabelBold[/LANG]" title="[LANG]bbCodeTitleBold[/LANG]" onclick="ajaxChat.insertBBCode('b');" style="font-weight:bold;"/>
			<input type="button" value="[LANG]bbCodeLabelItalic[/LANG]" title="[LANG]bbCodeTitleItalic[/LANG]" onclick="ajaxChat.insertBBCode('i');" style="font-style:italic;"/>
			<input type="button" value="[LANG]bbCodeLabelUnderline[/LANG]" title="[LANG]bbCodeTitleUnderline[/LANG]" onclick="ajaxChat.insertBBCode('u');" style="text-decoration:underline;"/>
			<input type="button" value="[LANG]bbCodeLabelQuote[/LANG]" title="[LANG]bbCodeTitleQuote[/LANG]" onclick="ajaxChat.insertBBCode('quote');"/>
			<input type="button" value="[LANG]bbCodeLabelCode[/LANG]" title="[LANG]bbCodeTitleCode[/LANG]" onclick="ajaxChat.insertBBCode('code');"/>
			<input type="button" value="[LANG]bbCodeLabelURL[/LANG]" title="[LANG]bbCodeTitleURL[/LANG]" onclick="ajaxChat.insertBBCode('url');"/>
			<input type="button" value="[LANG]bbCodeLabelImg[/LANG]" title="[LANG]bbCodeTitleImg[/LANG]" onclick="ajaxChat.insertBBCode('img');"/>
			<input type="button" value="[LANG]bbCodeLabelColor[/LANG]" title="[LANG]bbCodeTitleColor[/LANG]" onclick="ajaxChat.showHide('colorCodesContainer', null);"/>
		</div>
		<div id="colorCodesContainer" style="display:none;" dir="ltr"></div>
		<div id="optionsContainer">
			<input type="image" src="img/pixel.gif" class="button" id="helpButton" alt="[LANG]toggleHelp[/LANG]" title="[LANG]toggleHelp[/LANG]" onclick="toggleContainer('helpContainer', new Array('onlineListContainer','settingsContainer'));"/>
			<input type="image" src="img/pixel.gif" class="button" id="settingsButton" alt="[LANG]toggleSettings[/LANG]" title="[LANG]toggleSettings[/LANG]" onclick="toggleContainer('settingsContainer', new Array('onlineListContainer','helpContainer'));"/>
			<input type="image" src="img/pixel.gif" class="button" id="onlineListButton" alt="[LANG]toggleOnlineList[/LANG]" title="[LANG]toggleOnlineList[/LANG]" onclick="toggleContainer('onlineListContainer', new Array('settingsContainer','helpContainer'));"/>
			<input type="image" src="img/pixel.gif" class="button" id="audioButton" alt="[LANG]toggleAudio[/LANG]" title="[LANG]toggleAudio[/LANG]" onclick="ajaxChat.toggleSetting('audio', 'audioButton');"/>
			<input type="image" src="img/pixel.gif" class="button" id="autoScrollButton" alt="[LANG]toggleAutoScroll[/LANG]" title="[LANG]toggleAutoScroll[/LANG]" onclick="ajaxChat.toggleSetting('autoScroll', 'autoScrollButton');"/>
  		</div>
		<div id="onlineListContainer">
			<h3>[LANG]onlineUsers[/LANG]</h3>
	  		<div id="onlineList"></div>
	  	</div>
	  	<div id="helpContainer" style="display:none;">
 			<h3>[LANG]help[/LANG]</h3>
 			<div id="helpList">
				<table>
					<tr class="rowOdd">
						<td class="desc">[LANG]helpItemDescJoin[/LANG]</td>
						<td class="code">[LANG]helpItemCodeJoin[/LANG]</td>
					</tr>
					<tr class="rowEven">
						<td class="desc">[LANG]helpItemDescJoinCreate[/LANG]</td>
						<td class="code">[LANG]helpItemCodeJoinCreate[/LANG]</td>
					
					</tr>
					<tr class="rowOdd">
						<td class="desc">[LANG]helpItemDescInvite[/LANG]</td>
						<td class="code">[LANG]helpItemCodeInvite[/LANG]</td>
					</tr>
					<tr class="rowEven">
						<td class="desc">[LANG]helpItemDescUninvite[/LANG]</td>
						<td class="code">[LANG]helpItemCodeUninvite[/LANG]</td>
					</tr>
					
					<tr class="rowOdd">
						<td class="desc">[LANG]helpItemDescLogout[/LANG]</td>
						<td class="code">[LANG]helpItemCodeLogout[/LANG]</td>
					</tr>
					<tr class="rowEven">
						<td class="desc">[LANG]helpItemDescPrivateMessage[/LANG]</td>
						<td class="code">[LANG]helpItemCodePrivateMessage[/LANG]</td>
					</tr>
					<tr class="rowOdd">
					
						<td class="desc">[LANG]helpItemDescQueryOpen[/LANG]</td>
						<td class="code">[LANG]helpItemCodeQueryOpen[/LANG]</td>
					</tr>
					<tr class="rowEven">
						<td class="desc">[LANG]helpItemDescQueryClose[/LANG]</td>
						<td class="code">[LANG]helpItemCodeQueryClose[/LANG]</td>
					</tr>
					<tr class="rowOdd">
						<td class="desc">[LANG]helpItemDescAction[/LANG]</td>				
						<td class="code">[LANG]helpItemCodeAction[/LANG]</td>
					</tr>
					<tr class="rowEven">
						<td class="desc">[LANG]helpItemDescDescribe[/LANG]</td>
						<td class="code">[LANG]helpItemCodeDescribe[/LANG]</td>
					</tr>
					<tr class="rowOdd">
						<td class="desc">[LANG]helpItemDescIgnore[/LANG]</td>
						<td class="code">[LANG]helpItemCodeIgnore[/LANG]</td>
					
					</tr>
					<tr class="rowEven">
						<td class="desc">[LANG]helpItemDescIgnoreList[/LANG]</td>
						<td class="code">[LANG]helpItemCodeIgnoreList[/LANG]</td>
					</tr>
					<tr class="rowOdd">
						<td class="desc">[LANG]helpItemDescWhereis[/LANG]</td>
						<td class="code">[LANG]helpItemCodeWhereis[/LANG]</td>
					</tr>
					
					<tr class="rowEven">
						<td class="desc">[LANG]helpItemDescKick[/LANG]</td>
						<td class="code">[LANG]helpItemCodeKick[/LANG]</td>
					</tr>
					<tr class="rowOdd">
						<td class="desc">[LANG]helpItemDescUnban[/LANG]</td>
						<td class="code">[LANG]helpItemCodeUnban[/LANG]</td>
					</tr>
					<tr class="rowEven">
					
						<td class="desc">[LANG]helpItemDescBans[/LANG]</td>
						<td class="code">[LANG]helpItemCodeBans[/LANG]</td>
					</tr>
					<tr class="rowOdd">
						<td class="desc">[LANG]helpItemDescWhois[/LANG]</td>
						<td class="code">[LANG]helpItemCodeWhois[/LANG]</td>
					</tr>
					<tr class="rowEven">
						<td class="desc">[LANG]helpItemDescWho[/LANG]</td>
					
						<td class="code">[LANG]helpItemCodeWho[/LANG]</td>
					</tr>
					<tr class="rowOdd">
						<td class="desc">[LANG]helpItemDescList[/LANG]</td>
						<td class="code">[LANG]helpItemCodeList[/LANG]</td>
					</tr>
					<tr class="rowEven">
						<td class="desc">[LANG]helpItemDescRoll[/LANG]</td>
						<td class="code">[LANG]helpItemCodeRoll[/LANG]</td>
					
					</tr>
					<tr class="rowOdd">
						<td class="desc">[LANG]helpItemDescNick[/LANG]</td>
						<td class="code">[LANG]helpItemCodeNick[/LANG]</td>
					</tr>
				</table>
			</div>
	  	</div>
	  	<div id="settingsContainer" style="display:none;">
 			<h3>[LANG]settings[/LANG]</h3>
 			<div id="settingsList">
				<table>
					<tr class="rowOdd">
						<td><label for="bbCodeSetting">[LANG]settingsBBCode[/LANG]</label></td>
						<td class="setting"><input type="checkbox" id="bbCodeSetting" onclick="ajaxChat.setSetting('bbCode', this.checked);"/></td>
					</tr>
					<tr class="rowEven">
						<td><label for="bbCodeImagesSetting">[LANG]settingsBBCodeImages[/LANG]</label></td>
						<td class="setting"><input type="checkbox" id="bbCodeImagesSetting" onclick="ajaxChat.setSetting('bbCodeImages', this.checked);"/></td>
					</tr>
					<tr class="rowOdd">
						<td><label for="bbCodeColorsSetting">[LANG]settingsBBCodeColors[/LANG]</label></td>
						<td class="setting"><input type="checkbox" id="bbCodeColorsSetting" onclick="ajaxChat.setSetting('bbCodeColors', this.checked);"/></td>
					</tr>
					<tr class="rowEven">
						<td><label for="hyperLinksSetting">[LANG]settingsHyperLinks[/LANG]</label></td>
						<td class="setting"><input type="checkbox" id="hyperLinksSetting" onclick="ajaxChat.setSetting('hyperLinks', this.checked);"/></td>
					</tr>
					<tr class="rowOdd">
						<td><label for="lineBreaksSetting">[LANG]settingsLineBreaks[/LANG]</label></td>
						<td class="setting"><input type="checkbox" id="lineBreaksSetting" onclick="ajaxChat.setSetting('lineBreaks', this.checked);"/></td>
					</tr>
					<tr class="rowEven">
						<td><label for="emoticonsSetting">[LANG]settingsEmoticons[/LANG]</label></td>
						<td class="setting"><input type="checkbox" id="emoticonsSetting" onclick="ajaxChat.setSetting('emoticons', this.checked);"/></td>
					</tr>
					<tr class="rowOdd">
						<td><label for="autoFocusSetting">[LANG]settingsAutoFocus[/LANG]</label></td>
						<td class="setting"><input type="checkbox" id="autoFocusSetting" onclick="ajaxChat.setSetting('autoFocus', this.checked);"/></td>
					</tr>
					<tr class="rowEven">
						<td><label for="maxMessagesSetting">[LANG]settingsMaxMessages[/LANG]</label></td>
						<td class="setting"><input type="text" class="text" id="maxMessagesSetting" onchange="ajaxChat.setSetting('maxMessages', parseInt(this.value));"/></td>
					</tr>
					<tr class="rowOdd">
						<td><label for="wordWrapSetting">[LANG]settingsWordWrap[/LANG]</label></td>
						<td class="setting"><input type="checkbox" id="wordWrapSetting" onclick="ajaxChat.setSetting('wordWrap', this.checked);"/></td>
					</tr>
					<tr class="rowEven">
						<td><label for="maxWordLengthSetting">[LANG]settingsMaxWordLength[/LANG]</label></td>
						<td class="setting"><input type="text" class="text" id="maxWordLengthSetting" onchange="ajaxChat.setSetting('maxWordLength', parseInt(this.value));"/></td>
					</tr>
					<tr class="rowOdd">
						<td><label for="dateFormatSetting">[LANG]settingsDateFormat[/LANG]</label></td>
						<td class="setting"><input type="text" class="text" id="dateFormatSetting" onchange="ajaxChat.setSetting('dateFormat', this.value);"/></td>
					</tr>
					<tr class="rowEven">
						<td><label for="persistFontColorSetting">[LANG]settingsPersistFontColor[/LANG]</label></td>
						<td class="setting"><input type="checkbox" id="persistFontColorSetting" onclick="ajaxChat.setPersistFontColor(this.checked);"/></td>
					</tr>
					<tr class="rowOdd">
						<td><label for="audioVolumeSetting">[LANG]settingsAudioVolume[/LANG]</label></td>
						<td class="setting">
							<select class="left" id="audioVolumeSetting" onchange="ajaxChat.setAudioVolume(this.options[this.selectedIndex].value);">
								<option value="1.0">100 %</option>
								<option value="0.9">90 %</option>
								<option value="0.8">80 %</option>
								<option value="0.7">70 %</option>
								<option value="0.6">60 %</option>
								<option value="0.5">50 %</option>
								<option value="0.4">40 %</option>
								<option value="0.3">30 %</option>
								<option value="0.2">20 %</option>
								<option value="0.1">10 %</option>
							</select>
						</td>
					</tr>
					<tr class="rowEven">
						<td><label for="soundReceiveSetting">[LANG]settingsSoundReceive[/LANG]</label></td>
						<td class="setting">
							<select id="soundReceiveSetting" onchange="ajaxChat.setSetting('soundReceive', this.options[this.selectedIndex].value);"><option value="">-</option></select><input type="image" src="img/pixel.gif" class="button playback" alt="[LANG]playSelectedSound[/LANG]" title="[LANG]playSelectedSound[/LANG]" onclick="ajaxChat.playSound(this.previousSibling.options[this.previousSibling.selectedIndex].value);"/>
						</td>
					</tr>
					<tr class="rowOdd">
						<td><label for="soundSendSetting">[LANG]settingsSoundSend[/LANG]</label></td>
						<td class="setting">
							<select id="soundSendSetting" onchange="ajaxChat.setSetting('soundSend', this.options[this.selectedIndex].value);"><option value="">-</option></select><input type="image" src="img/pixel.gif" class="button playback" alt="[LANG]playSelectedSound[/LANG]" title="[LANG]playSelectedSound[/LANG]" onclick="ajaxChat.playSound(this.previousSibling.options[this.previousSibling.selectedIndex].value);"/>
						</td>
					</tr>
					<tr class="rowEven">
						<td><label for="soundEnterSetting">[LANG]settingsSoundEnter[/LANG]</label></td>
						<td class="setting">
							<select id="soundEnterSetting" onchange="ajaxChat.setSetting('soundEnter', this.options[this.selectedIndex].value);"><option value="">-</option></select><input type="image" src="img/pixel.gif" class="button playback" alt="[LANG]playSelectedSound[/LANG]" title="[LANG]playSelectedSound[/LANG]" onclick="ajaxChat.playSound(this.previousSibling.options[this.previousSibling.selectedIndex].value);"/>
						</td>
					</tr>
					<tr class="rowOdd">
						<td><label for="soundLeaveSetting">[LANG]settingsSoundLeave[/LANG]</label></td>
						<td class="setting">
							<select id="soundLeaveSetting" onchange="ajaxChat.setSetting('soundLeave', this.options[this.selectedIndex].value);"><option value="">-</option></select><input type="image" src="img/pixel.gif" class="button playback" alt="[LANG]playSelectedSound[/LANG]" title="[LANG]playSelectedSound[/LANG]" onclick="ajaxChat.playSound(this.previousSibling.options[this.previousSibling.selectedIndex].value);"/>
						</td>
					</tr>
					<tr class="rowEven">
						<td><label for="soundChatBotSetting">[LANG]settingsSoundChatBot[/LANG]</label></td>
						<td class="setting">
							<select id="soundChatBotSetting" onchange="ajaxChat.setSetting('soundChatBot', this.options[this.selectedIndex].value);"><option value="">-</option></select><input type="image" src="img/pixel.gif" class="button playback" alt="[LANG]playSelectedSound[/LANG]" title="[LANG]playSelectedSound[/LANG]" onclick="ajaxChat.playSound(this.previousSibling.options[this.previousSibling.selectedIndex].value);"/>
						</td>
					</tr>
					<tr class="rowOdd">
						<td><label for="soundErrorSetting">[LANG]settingsSoundError[/LANG]</label></td>
						<td class="setting">
							<select id="soundErrorSetting" onchange="ajaxChat.setSetting('soundError', this.options[this.selectedIndex].value);"><option value="">-</option></select><input type="image" src="img/pixel.gif" class="button playback" alt="[LANG]playSelectedSound[/LANG]" title="[LANG]playSelectedSound[/LANG]" onclick="ajaxChat.playSound(this.previousSibling.options[this.previousSibling.selectedIndex].value);"/>
						</td>
					</tr>
					<tr class="rowEven">
						<td><label for="blinkSetting">[LANG]settingsBlink[/LANG]</label></td>
						<td class="setting"><input type="checkbox" id="blinkSetting" onclick="ajaxChat.setSetting('blink', this.checked);"/></td>
					</tr>
					<tr class="rowOdd">
						<td><label for="blinkIntervalSetting">[LANG]settingsBlinkInterval[/LANG]</label></td>
						<td class="setting"><input type="text" class="text" id="blinkIntervalSetting" onchange="ajaxChat.setSetting('blinkInterval', parseInt(this.value));"/></td>
					</tr>
					<tr class="rowEven">
						<td><label for="blinkIntervalNumberSetting">[LANG]settingsBlinkIntervalNumber[/LANG]</label></td>
						<td class="setting"><input type="text" class="text" id="blinkIntervalNumberSetting" onchange="ajaxChat.setSetting('blinkIntervalNumber', parseInt(this.value));"/></td>
					</tr>
				</table>
			</div>
	  	</div>
		<!--
			Please retain the full copyright notice below including the link to blueimp.net.
			This not only gives respect to the amount of time given freely by the developer
			but also helps build interest, traffic and use of AJAX Chat.
			
			Thanks,
			Sebastian Tschan
		//-->
		<div id="copyright"><a href="https://blueimp.net/ajax/">AJAX Chat</a> &copy; <a href="https://blueimp.net">blueimp.net</a></div>
	</div>
	<div id="flashInterfaceContainer"></div>
</body>

</html>