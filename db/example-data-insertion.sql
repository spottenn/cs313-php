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
    'saving',
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

INSERT INTO incomes (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jane''s projection') ,
    'job',
    1000,
    '2020-10-25',
    NULL,
    'months',
    1
);
INSERT INTO incomes (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'John''s projection') ,
    'self employment',
    2000,
    '2020-10-25',
    NULL,
    'months',
    1
);
INSERT INTO incomes (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jack''s projection') ,
    'mom',
    500,
    '2020-10-25',
    NULL,
    'months',
    1
);
INSERT INTO incomes (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jade''s projection') ,
    'job',
    1500,
    '2020-10-25',
    NULL,
    'months',
    1
);
INSERT INTO incomes (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jade''s projection') ,
    'husband''s job',
    1000,
    '2020-10-25',
    NULL,
    'months',
    1
);

INSERT INTO expenses (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jane''s projection') ,
    'Jane''s rent',
    400,
    '2020-10-26',
    NULL,
    'months',
    1
);
INSERT INTO expenses (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jane''s projection') ,
    'utilities',
    100,
    '2020-10-27',
    NULL,
    'months',
    1
);
INSERT INTO expenses (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jane''s projection') ,
    'netflix',
    10,
    '2020-10-28',
    NULL,
    'months',
    1
);
INSERT INTO expenses (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jane''s projection') ,
    'groceries',
    200,
    '2020-10-29',
    NULL,
    'months',
    1
);
INSERT INTO expenses (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jane''s projection') ,
    'fun',
    50,
    '2020-10-30',
    NULL,
    'months',
    1
);

INSERT INTO expenses (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'John''s projection') ,
    'John''s rent',
    400,
    '2020-10-26',
    NULL,
    'months',
    1
);
INSERT INTO expenses (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'John''s projection') ,
    'utilities',
    100,
    '2020-10-27',
    NULL,
    'months',
    1
);
INSERT INTO expenses (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'John''s projection') ,
    'netflix',
    10,
    '2020-10-28',
    NULL,
    'months',
    1
);
INSERT INTO expenses (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'John''s projection') ,
    'groceries',
    200,
    '2020-10-29',
    NULL,
    'months',
    1
);
INSERT INTO expenses (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'John''s projection') ,
    'fun',
    50,
    '2020-10-30',
    NULL,
    'months',
    1
);

INSERT INTO expenses (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jack''s projection') ,
    'Jack''s rent',
    400,
    '2020-10-26',
    NULL,
    'months',
    1
);
INSERT INTO expenses (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jack''s projection') ,
    'utilities',
    100,
    '2020-10-27',
    NULL,
    'months',
    1
);
INSERT INTO expenses (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jack''s projection') ,
    'netflix',
    10,
    '2020-10-28',
    NULL,
    'months',
    1
);
INSERT INTO expenses (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jack''s projection') ,
    'groceries',
    200,
    '2020-10-29',
    NULL,
    'months',
    1
);
INSERT INTO expenses (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jack''s projection') ,
    'fun',
    50,
    '2020-10-30',
    NULL,
    'months',
    1
);

INSERT INTO expenses (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jade''s projection') ,
    'Jade''s rent',
    400,
    '2020-10-26',
    NULL,
    'months',
    1
);
INSERT INTO expenses (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jade''s projection') ,
    'utilities',
    100,
    '2020-10-27',
    NULL,
    'months',
    1
);
INSERT INTO expenses (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jade''s projection') ,
    'netflix',
    10,
    '2020-10-28',
    NULL,
    'months',
    1
);
INSERT INTO expenses (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jade''s projection') ,
    'groceries',
    200,
    '2020-10-29',
    NULL,
    'months',
    1
);
INSERT INTO expenses (projection_id, name, amount_cents, start_date, end_date, repeats, repeat_frequency) VALUES (
    (SELECT id FROM projections WHERE name = 'Jade''s projection') ,
    'fun',
    50,
    '2020-10-30',
    NULL,
    'months',
    1
);
