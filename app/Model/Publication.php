<?php
App::uses('AppModel', 'Model');
/**
 * Publication Model
 *
 */
class Publication extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'publication_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'publication_name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'publication_id' => array(
			'blank' => array(
				'rule' => array('blank'),
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'publication_name' => array(
			'words' => array(
				'rule' => array('custom','/([\w.-]+ )+[\w+.-]/'),
				'message' => 'The publication name can only contain letters, numbers and spaces.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'The publication name must not be empty.',
			),
			'maxLength' => array(
				'rule' => array('maxLength',100),
				'message' => 'The publication name cannot be longer than 100 characters.',
			),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'This publication name already exists.',
			),
		),
	);
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'PublicationIssues' => array(
			'className' => 'Issue',
			'foreignKey' => 'issue_publication_id',
		)
	);
}	
}
