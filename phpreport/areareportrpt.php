<?php
namespace PHPReportMaker12\project1;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start();

// Autoload
include_once "rautoload.php";
?>
<?php

// Create page object
if (!isset($areareport_rpt))
	$areareport_rpt = new areareport_rpt();
if (isset($Page))
	$OldPage = $Page;
$Page = &$areareport_rpt;

// Run the page
$Page->run();

// Setup login status
SetClientVar("login", LoginStatus());
if (!$DashboardReport)
	WriteHeader(FALSE);

// Global Page Rendering event (in rusrfn*.php)
Page_Rendering();

// Page Rendering event
$Page->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "rheader.php" ?>
<?php } ?>
<?php if ($Page->Export == "" || $Page->Export == "print") { ?>
<script>
currentPageID = ew.PAGE_ID = "rpt"; // Page ID
</script>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Form object
var fareareportrpt = currentForm = new ew.Form("fareareportrpt");

// Validate method
fareareportrpt.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fareareportrpt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
fareareportrpt.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fareareportrpt.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
fareareportrpt.lists["x_city_name"] = <?php echo $areareport_rpt->city_name->Lookup->toClientList() ?>;
fareareportrpt.lists["x_city_name"].popupValues = <?php echo json_encode($areareport_rpt->city_name->SelectionList) ?>;
fareareportrpt.lists["x_city_name"].popupOptions = <?php echo JsonEncode($areareport_rpt->city_name->popupOptions()) ?>;
fareareportrpt.lists["x_city_name"].options = <?php echo JsonEncode($areareport_rpt->city_name->lookupOptions()) ?>;
</script>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<a id="top"></a>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-container" class="container-fluid ew-container">
<?php } ?>
<?php if (ReportParam("showfilter") === TRUE) { ?>
<?php $Page->showFilterList(TRUE) ?>
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$Page->DrillDownInPanel) {
	$Page->ExportOptions->render("body");
	$Page->SearchOptions->render("body");
	$Page->FilterOptions->render("body");
	$Page->GenerateOptions->render("body");
}
?>
</div>
<?php $Page->showPageHeader(); ?>
<?php $Page->showMessage(); ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<!-- Center Container - Report -->
<div id="ew-center" class="<?php echo $areareport_rpt->CenterContentClass ?>">
<?php } ?>
<!-- Summary Report begins -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="report_summary">
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<!-- Search form (begin) -->
<?php

	// Render search row
	$Page->resetAttributes();
	$Page->RowType = ROWTYPE_SEARCH;
	$Page->renderRow();
?>
<form name="fareareportrpt" id="fareareportrpt" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="fareareportrpt-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_city_name" class="ew-cell form-group">
	<label for="x_city_name" class="ew-search-caption ew-label"><?php echo $Page->city_name->caption() ?></label>
	<span class="ew-search-field">
<?php $Page->city_name->EditAttrs["onchange"] = "ew.forms(this).submit(); " . @$Page->city_name->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="areareport" data-field="x_city_name" data-value-separator="<?php echo $Page->city_name->displayValueSeparatorAttribute() ?>" id="x_city_name" name="x_city_name"<?php echo $Page->city_name->editAttributes() ?>>
		<?php echo $Page->city_name->selectOptionListHtml("x_city_name") ?>
	</select>
</div>
<?php echo $Page->city_name->Lookup->getParamTag("p_x_city_name") ?>
</span>
</div>
</div>
</div>
</form>
<script>
fareareportrpt.filterList = <?php echo $Page->getFilterList() ?>;
</script>
<!-- Search form (end) -->
<?php } ?>
<?php if ($Page->ShowCurrentFilter) { ?>
<?php $Page->showFilterList() ?>
<?php } ?>
<?php

// Set the last group to display if not export all
if ($Page->ExportAll && $Page->Export <> "") {
	$Page->StopGroup = $Page->TotalGroups;
} else {
	$Page->StopGroup = $Page->StartGroup + $Page->DisplayGroups - 1;
}

// Stop group <= total number of groups
if (intval($Page->StopGroup) > intval($Page->TotalGroups))
	$Page->StopGroup = $Page->TotalGroups;
$Page->RecordCount = 0;
$Page->RecordIndex = 0;

// Get first row
if ($Page->TotalGroups > 0) {
	$Page->loadRowValues(TRUE);
	$Page->GroupCount = 1;
}
$Page->GroupIndexes = InitArray(2, -1);
$Page->GroupIndexes[0] = -1;
$Page->GroupIndexes[1] = $Page->StopGroup - $Page->StartGroup + 1;
while ($Page->Recordset && !$Page->Recordset->EOF && $Page->GroupCount <= $Page->DisplayGroups || $Page->ShowHeader) {

	// Show dummy header for custom template
	// Show header

	if ($Page->ShowHeader) {
?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_areareport" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->area_id->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="area_id"><div class="areareport_area_id"><span class="ew-table-header-caption"><?php echo $Page->area_id->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="area_id">
<?php if ($Page->sortUrl($Page->area_id) == "") { ?>
		<div class="ew-table-header-btn areareport_area_id">
			<span class="ew-table-header-caption"><?php echo $Page->area_id->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer areareport_area_id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->area_id) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->area_id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->area_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->area_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->city_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="city_name"><div class="areareport_city_name"><span class="ew-table-header-caption"><?php echo $Page->city_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="city_name">
<?php if ($Page->sortUrl($Page->city_name) == "") { ?>
		<div class="ew-table-header-btn areareport_city_name">
			<span class="ew-table-header-caption"><?php echo $Page->city_name->caption() ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_city_name', form: 'fareareportrpt', name: 'areareport_city_name', range: false, from: '<?php echo $Page->city_name->RangeFrom; ?>', to: '<?php echo $Page->city_name->RangeTo; ?>' });" id="x_city_name<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer areareport_city_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->city_name) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->city_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->city_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->city_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_city_name', form: 'fareareportrpt', name: 'areareport_city_name', range: false, from: '<?php echo $Page->city_name->RangeFrom; ?>', to: '<?php echo $Page->city_name->RangeTo; ?>' });" id="x_city_name<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->area_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="area_name"><div class="areareport_area_name"><span class="ew-table-header-caption"><?php echo $Page->area_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="area_name">
<?php if ($Page->sortUrl($Page->area_name) == "") { ?>
		<div class="ew-table-header-btn areareport_area_name">
			<span class="ew-table-header-caption"><?php echo $Page->area_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer areareport_area_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->area_name) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->area_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->area_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->area_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->area_pincode->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="area_pincode"><div class="areareport_area_pincode"><span class="ew-table-header-caption"><?php echo $Page->area_pincode->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="area_pincode">
<?php if ($Page->sortUrl($Page->area_pincode) == "") { ?>
		<div class="ew-table-header-btn areareport_area_pincode">
			<span class="ew-table-header-caption"><?php echo $Page->area_pincode->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer areareport_area_pincode" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->area_pincode) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->area_pincode->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->area_pincode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->area_pincode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
	</tr>
</thead>
<tbody>
<?php
		if ($Page->TotalGroups == 0) break; // Show header only
		$Page->ShowHeader = FALSE;
	}
	$Page->RecordCount++;
	$Page->RecordIndex++;
?>
<?php

		// Render detail row
		$Page->resetAttributes();
		$Page->RowType = ROWTYPE_DETAIL;
		$Page->renderRow();
?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->area_id->Visible) { ?>
		<td data-field="area_id"<?php echo $Page->area_id->cellAttributes() ?>>
<span<?php echo $Page->area_id->viewAttributes() ?>><?php echo $Page->area_id->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->city_name->Visible) { ?>
		<td data-field="city_name"<?php echo $Page->city_name->cellAttributes() ?>>
<span<?php echo $Page->city_name->viewAttributes() ?>><?php echo $Page->city_name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->area_name->Visible) { ?>
		<td data-field="area_name"<?php echo $Page->area_name->cellAttributes() ?>>
<span<?php echo $Page->area_name->viewAttributes() ?>><?php echo $Page->area_name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->area_pincode->Visible) { ?>
		<td data-field="area_pincode"<?php echo $Page->area_pincode->cellAttributes() ?>>
<span<?php echo $Page->area_pincode->viewAttributes() ?>><?php echo $Page->area_pincode->getViewValue() ?></span></td>
<?php } ?>
	</tr>
<?php

		// Accumulate page summary
		$Page->accumulateSummary();

		// Get next record
		$Page->loadRowValues();
	$Page->GroupCount++;
} // End while
?>
<?php if ($Page->TotalGroups > 0) { ?>
</tbody>
<tfoot>
	</tfoot>
<?php } elseif (!$Page->ShowHeader && TRUE) { // No header displayed ?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_areareport" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<?php } ?>
<?php if ($Page->TotalGroups > 0 || TRUE) { // Show footer ?>
</table>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php if ($Page->Export == "" && !($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php include "areareport_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<!-- Summary Report Ends -->
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /.ew-container -->
<?php } ?>
<?php
$Page->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php

// Close recordsets
if ($Page->GroupRecordset)
	$Page->GroupRecordset->Close();
if ($Page->Recordset)
	$Page->Recordset->Close();
?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Write your table-specific startup script here
// console.log("page loaded");

</script>
<?php } ?>
<?php if (!$DashboardReport) { ?>
<?php include_once "rfooter.php" ?>
<?php } ?>
<?php
$Page->terminate();
if (isset($OldPage))
	$Page = $OldPage;
?>