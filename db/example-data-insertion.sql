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
