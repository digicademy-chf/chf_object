# Remove after TYPO3 13.2 when all fields are being auto-created

CREATE TABLE tx_chfobject_domain_model_object_group (
    name varchar(255) DEFAULT '' NOT NULL,
    alternativeName varchar(255) DEFAULT '' NOT NULL,
    importOrigin varchar(255) DEFAULT '' NOT NULL
);

CREATE TABLE tx_chfobject_domain_model_single_object (
    name varchar(255) DEFAULT '' NOT NULL,
    alternativeName varchar(255) DEFAULT '' NOT NULL,
    importOrigin varchar(255) DEFAULT '' NOT NULL
);

# Remove when forge.typo3.org/issues/98322 is fixed to auto-generate these fields

CREATE TABLE tx_chfobject_domain_model_object_group_feature_geodata_mm (
	fieldname varchar(63) DEFAULT '' NOT NULL
	tablename varchar(63) DEFAULT '' NOT NULL
);

CREATE TABLE tx_chfobject_domain_model_object_group_resource_floorplan_mm (
	fieldname varchar(63) DEFAULT '' NOT NULL
	tablename varchar(63) DEFAULT '' NOT NULL
);

CREATE TABLE tx_chfobject_domain_model_object_group_tag_label_mm (
	fieldname varchar(63) DEFAULT '' NOT NULL
	tablename varchar(63) DEFAULT '' NOT NULL
);

CREATE TABLE tx_chfobject_domain_model_single_object_feature_geodata_mm (
	fieldname varchar(63) DEFAULT '' NOT NULL
	tablename varchar(63) DEFAULT '' NOT NULL
);

CREATE TABLE tx_chfobject_domain_model_single_object_tag_label_mm (
	fieldname varchar(63) DEFAULT '' NOT NULL
	tablename varchar(63) DEFAULT '' NOT NULL
);
