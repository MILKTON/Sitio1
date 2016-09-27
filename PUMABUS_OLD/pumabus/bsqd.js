$(document).ready(function()
{
 tabbed = new google.search.SearchControl();
 unam_search = new google.search.WebSearch();
 pumabus_search = new google.search.WebSearch();

 tabbed.setLinkTarget(google.search.Search.LINK_TARGET_SELF);
 pumabus_search.setSiteRestriction("015274807114692480877:6zchoqermie");
 pumabus_search.setUserDefinedLabel("Resultados en PUMABUS");
 pumabus_search.setResultSetSize(google.search.Search.LARGE_RESULTSET);
 unam_search.setSiteRestriction("015274807114692480877:vfxoudddbck");
 unam_search.setUserDefinedLabel("Resultados en la UNAM");
 unam_search.setResultSetSize(google.search.Search.LARGE_RESULTSET);

 tabbed.addSearcher(pumabus_search);
 tabbed.addSearcher(unam_search);

 tabbed.setNoResultsString("<strong>No se encontraron resultados en esta pestaña</strong>");

 var drawOptions = new google.search.DrawOptions();
 drawOptions.setDrawMode(google.search.SearchControl.DRAW_MODE_TABBED);

 tabbed.draw(document.getElementById("buscargoogle"), drawOptions);
});

      