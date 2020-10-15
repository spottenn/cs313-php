INSERT INTO projections (name, created) VALUES ('projection', current_timestamp);
INSERT INTO bank_accounts (projection_id, name, type, amount_cents) VALUES (
                                                                               (SELECT id FROM projections WHERE name = 'projection') ,
                                                                               'my checking',
                                                                               'checking',
                                                                               100000
                                                                           );
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
                                                                                                                                     (SELECT id FROM projections WHERE name = 'projection') ,
                                                                                                                                     'income',
                                                                                                                                     'job',
                                                                                                                                     1000,
                                                                                                                                     '2020-10-25',
                                                                                                                                     NULL,
                                                                                                                                     'months',
                                                                                                                                     1
                                                                                                                                 );
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
                                                                                                                                     (SELECT id FROM projections WHERE name = 'projection') ,
                                                                                                                                     'income',
                                                                                                                                     'self employment',
                                                                                                                                     2000,
                                                                                                                                     '2020-10-25',
                                                                                                                                     NULL,
                                                                                                                                     'months',
                                                                                                                                     1
                                                                                                                                 );
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
                                                                                                                                     (SELECT id FROM projections WHERE name = 'projection') ,
                                                                                                                                     'income',
                                                                                                                                     'mom',
                                                                                                                                     500,
                                                                                                                                     '2020-10-25',
                                                                                                                                     NULL,
                                                                                                                                     'months',
                                                                                                                                     1
                                                                                                                                 );
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
                                                                                                                                     (SELECT id FROM projections WHERE name = 'projection') ,
                                                                                                                                     'income',
                                                                                                                                     'job',
                                                                                                                                     1500,
                                                                                                                                     '2020-10-25',
                                                                                                                                     NULL,
                                                                                                                                     'months',
                                                                                                                                     1
                                                                                                                                 );
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
                                                                                                                                     (SELECT id FROM projections WHERE name = 'projection') ,
                                                                                                                                     'income',
                                                                                                                                     'husband''s job',
                                                                                                                                     1000,
                                                                                                                                     '2020-10-25',
                                                                                                                                     NULL,
                                                                                                                                     'months',
                                                                                                                                     1
                                                                                                                                 );

INSERT INTO projections (name, created) VALUES ('Jane''s projection', current_timestamp);
INSERT INTO projections (name, created, length) VALUES ('John''s projection', current_timestamp, '6 months');
INSERT INTO projections (name, created, length) VALUES ('Jack''s projection', current_timestamp, '9 months');
INSERT INTO projections (name, created) VALUES ('Jade''s projection', current_timestamp);


INSERT INTO bank_accounts (projection_id, name, type, amount_cents) VALUES (
    (SELECT id FROM projections WHERE name = 'Jane''s projection') ,
    'my checking',
    'checking',
    100000
);
INSERT INTO bank_accounts (projection_id, name, type, amount_cents) VALUES (
    (SELECT id FROM projections WHERE name = 'John''s projection') ,
    'my savings',
    'savings',
    300000
);
INSERT INTO bank_accounts (projection_id, name, type, amount_cents) VALUES (
    (SELECT id FROM projections WHERE name = 'Jack''s projection') ,
    'my checking',
    'checking',
    50000
);
INSERT INTO bank_accounts (projection_id, name, type, amount_cents) VALUES (
    (SELECT id FROM projections WHERE name = 'Jade''s projection') ,
    'my checking',
    'checking',
    1000000
);

INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jane''s projection') ,
    'income',
    'job',
    1000,
    '2020-10-25',
    NULL,
    'months',
    1
);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'John''s projection') ,
    'income',
    'self employment',
    2000,
    '2020-10-25',
    NULL,
    'months',
    1
);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jack''s projection') ,
    'income',
    'mom',
    500,
    '2020-10-25',
    NULL,
    'months',
    1
);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jade''s projection') ,
    'income',
    'job',
    1500,
    '2020-10-25',
    NULL,
    'months',
    1
);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jade''s projection') ,
    'income',
    'husband''s job',
    1000,
    '2020-10-25',
    NULL,
    'months',
    1
);

INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jane''s projection') ,
    'expense',
    'Jane''s rent',
    400,
    '2020-10-26',
    NULL,
    'months',
    1
);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jane''s projection') ,
    'expense',
    'utilities',
    100,
    '2020-10-27',
    NULL,
    'months',
    1
);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jane''s projection') ,
    'expense',
    'netflix',
    10,
    '2020-10-28',
    NULL,
    'months',
    1
);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jane''s projection') ,
    'expense',
    'groceries',
    200,
    '2020-10-29',
    NULL,
    'months',
    1
);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jane''s projection') ,
    'expense',
    'fun',
    50,
    '2020-10-30',
    NULL,
    'months',
    1
);

INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'John''s projection') ,
    'expense',
    'John''s rent',
    400,
    '2020-10-26',
    NULL,
    'months',
    1
);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'John''s projection') ,
    'expense',
    'utilities',
    100,
    '2020-10-27',
    NULL,
    'months',
    1
);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'John''s projection') ,
    'expense',
    'netflix',
    10,
    '2020-10-28',
    NULL,
    'months',
    1
);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'John''s projection') ,
    'expense',
    'groceries',
    200,
    '2020-10-29',
    NULL,
    'months',
    1
);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'John''s projection') ,
    'expense',
    'fun',
    50,
    '2020-10-30',
    NULL,
    'months',
    1
);

INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jack''s projection') ,
    'expense',
    'Jack''s rent',
    400,
    '2020-10-26',
    NULL,
    'months',
    1
);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jack''s projection') ,
    'expense',
    'utilities',
    100,
    '2020-10-27',
    NULL,
    'months',
    1
);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jack''s projection') ,
    'expense',
    'netflix',
    10,
    '2020-10-28',
    NULL,
    'months',
    1
);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jack''s projection') ,
    'expense',
    'groceries',
    200,
    '2020-10-29',
    NULL,
    'months',
    1
);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jack''s projection') ,
    'expense',
    'fun',
    50,
    '2020-10-30',
    NULL,
    'months',
    1
);

INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jade''s projection') ,
    'expense',
    'Jade''s rent',
    400,
    '2020-10-26',
    NULL,
    'months',
    1
);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jade''s projection') ,
    'expense',
    'utilities',
    100,
    '2020-10-27',
    NULL,
    'months',
    1
);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jade''s projection') ,
    'expense',
    'netflix',
    10,
    '2020-10-28',
    NULL,
    'months',
    1
);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jade''s projection') ,
    'expense',
    'groceries',
    200,
    '2020-10-29',
    NULL,
    'months',
    1
);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jade''s projection') ,
    'expense',
    'fun',
    50,
    '2020-10-30',
    NULL,
    'months',
    1
);


INSERT INTO pretty_names VALUES ('name', 'Name');
INSERT INTO pretty_names VALUES ('created', 'Created On');
INSERT INTO pretty_names VALUES ('length', 'Length');
INSERT INTO pretty_names VALUES ('expense', 'Expense');
INSERT INTO pretty_names VALUES ('income', 'Income');
INSERT INTO pretty_names VALUES ('entry_type', 'Entry Type');
INSERT INTO pretty_names VALUES ('amount_cents', 'Amount in Cents');
INSERT INTO pretty_names VALUES ('start_date', 'Starts on');
INSERT INTO pretty_names VALUES ('end_date', 'Ends on');
INSERT INTO pretty_names VALUES ('repeats', 'Repeats');
INSERT INTO pretty_names VALUES ('repeat_frequency', 'Every');
INSERT INTO pretty_names VALUES ('checking', 'Checking');
INSERT INTO pretty_names VALUES ('savings', 'Savings');
INSERT INTO pretty_names VALUES ('other', 'Other');
INSERT INTO pretty_names VALUES ('type', 'Account Type');
INSERT INTO pretty_names VALUES ('pretty_name', 'Pretty Name');
INSERT INTO pretty_names VALUES ('pretty_names', 'Pretty Names');
INSERT INTO pretty_names VALUES ('projections', 'Projections');
INSERT INTO pretty_names VALUES ('repeat_type', 'Repeat Type');
INSERT INTO pretty_names VALUES ('proj_entries', 'Projection Entries');
INSERT INTO pretty_names VALUES ('bank_account_type', 'Bank Account Type');
INSERT INTO pretty_names VALUES ('bank_accounts', 'Bank Accounts');
