<?php

import('lib.pkp.classes.plugins.GenericPlugin');

class Remark42opsPlugin extends GenericPlugin {

    public function register($category, $path, $mainContextId = null) {
        if (parent::register($category, $path, $mainContextId)) {
            if ($this->getEnabled($mainContextId)) {
                HookRegistry::register('Templates::Preprint::Footer::PageFooter', array($this, 'insertRemark42'));
            }
            return true;
        }
        return false;
    }

    public function getDisplayName() {
        return 'Remark42 Comments Plugin';
    }

    public function getDescription() {
        return 'Integrates the self-hosted Remark42 comment system.';
    }

    public function insertRemark42($hookName, $params) {
        $templateMgr =& $params[1];
        $output =& $params[2];

        // --- Your Remark42 Configuration ---
        $remarkUrl = 'https://geoarxiv.space/remark42'; // Your REMARK_URL
        $remarkSiteId = 'geoarxiv'; // Your SITE id

        // Pass variables to the Smarty template
        $templateMgr->assign('remarkUrl', $remarkUrl);
        $templateMgr->assign('remarkSiteId', $remarkSiteId);

        $output .= $templateMgr->fetch($this->getTemplateResource('comments.tpl'));

        return false;
    }
}
