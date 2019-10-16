$("div.alert").delay(4000).slideUp();

function accessDelete(message)
{
	if (window.confirm(message)) {
		return true;
	}
	return false;
}
