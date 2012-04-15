<?php

class CustomSiteConfig extends DataExtension {

    function extraStatics() {
        return array(
            'db' => array(
                'SiteState'			=> "Enum('maintenance,normal','normal','normal')",
				'BusinessAddress'	=>	'varchar',
				'MaintenanceMode'	=>	'varchar'
            )
       );
    }

    public function updateCMSFields(FieldSet &$fields) {
		$fields->addFieldToTab('Root.Main', new TextField('BusinessAddress', 'Address'));
		$fields->addFieldToTab('Root.Main', new TextField('MaintenanceMode', 'Maintenance Text'));
		$fields->addFieldToTab("Root.Main", new DropdownField('SiteState', 'Site State', array('maintenance'=>'maintenance','normal'=>'normal')));
    }

}
