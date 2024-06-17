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
