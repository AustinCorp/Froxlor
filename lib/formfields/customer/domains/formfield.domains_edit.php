<?php

/**
 * This file is part of the Froxlor project.
 * Copyright (c) 2010 the Froxlor Team (see authors).
 *
 * For the full copyright and license information, please view the COPYING
 * file that was distributed with this source code. You can also view the
 * COPYING file online at http://files.froxlor.org/misc/COPYING.txt
 *
 * @copyright  (c) the authors
 * @author     Froxlor team <team@froxlor.org> (2010-)
 * @license    GPLv2 http://files.froxlor.org/misc/COPYING.txt
 * @package    Formfields
 *
 */

return array(
	'domain_edit' => array(
		'title' => $lng['domains']['subdomain_edit'],
		'image' => 'icons/domain_edit.png',
		'sections' => array(
			'section_a' => array(
				'title' => $lng['domains']['subdomain_edit'],
				'image' => 'icons/domain_edit.png',
				'fields' => array(
					'domain' => array(
						'label' => $lng['domains']['domainname'],
						'type' => 'label',
						'value' => $result['domain']
					),
					'dns' => array(
						'label' => $lng['dns']['destinationip'],
						'type' => 'label',
						'value' => $domainip
					),
					'alias' => array(
						'visible' => ($alias_check == '0' ? true : false),
						'label' => $lng['domains']['aliasdomain'],
						'type' => 'select',
						'select_var' => $domains
					),
					'path' => array(
						'label' => $lng['panel']['path'],
						'desc' => (Settings::Get('panel.pathedit') != 'Dropdown' ? $lng['panel']['pathDescriptionSubdomain'] : null).(isset($pathSelect['note']) ? '<br />'.$pathSelect['value'] : ''),
						'type' => $pathSelect['type'],
						'select_var' => $pathSelect['value'],
						'value' => $pathSelect['value']
					),
					'url' => array(
						'visible' => (Settings::Get('panel.pathedit') == 'Dropdown' ? true : false),
						'label' => $lng['panel']['urloverridespath'],
						'type' => 'text',
						'value' => $urlvalue
					),
					'redirectcode' => array(
						'visible' => ((Settings::Get('system.webserver') == 'apache2' && Settings::Get('customredirect.enabled') == '1') ? true : false),
						'label' => $lng['domains']['redirectifpathisurl'],
						'desc' => $lng['domains']['redirectifpathisurlinfo'],
						'type' => 'select',
						'select_var' => $redirectcode
					),
					'selectserveralias' => array(
						'visible' => (($result['parentdomainid'] == '0' && $userinfo['subdomains'] != '0') ? true : false),
						'label' => $lng['admin']['selectserveralias'],
						'desc' => $lng['admin']['selectserveralias_desc'],
						'type' => 'select',
						'select_var' => $serveraliasoptions
					),
					'isemaildomain' => array(
						'visible' => ((( $result['subcanemaildomain'] == '1' || $result['subcanemaildomain'] == '2' ) && $result['parentdomainid'] != '0') ? true : false),
						'label' => 'Emaildomain',
						'type' => 'checkbox',
						'values' => array(
										array ('label' => $lng['panel']['yes'], 'value' => '1')
									),
						'value' => array($result['isemaildomain'])
					),
					'ssl_redirect' => array(
						'visible' => (Settings::Get('system.use_ssl') == '1' ? ($ssl_ipsandports != '' ? (domainHasSslIpPort($result['id']) ? true : false) : false) : false),
						'label' => $lng['domains']['ssl_redirect']['title'],
						'desc' => $lng['domains']['ssl_redirect']['description'],
						'type' => 'checkbox',
						'values' => array(
										array ('label' => $lng['panel']['yes'], 'value' => '1')
									),
						'value' => array($result['ssl_redirect'])
					),
					'openbasedir_path' => array(
						'visible' => ($result['openbasedir'] == '1') ? true : false,
						'label' => $lng['domain']['openbasedirpath'],
						'type' => 'select',
						'select_var' => $openbasedir
					)
				)
			)
		)
	)
);
