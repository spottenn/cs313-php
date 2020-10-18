INSERT INTO users (username, created)
VALUES ('user', current_timestamp);
INSERT INTO projections (user_id, name, created)
VALUES ((SELECT id FROM users WHERE username = 'user'), 'projection', current_timestamp);
INSERT INTO bank_accounts (projection_id, name, type, amount_cents)
VALUES ((SELECT id FROM projections WHERE name = 'projection'),
        'my checking',
        'checking',
        100000);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'projection'),
        'income',
        'job',
        1000,
        '2020-10-25',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'projection'),
        'income',
        'self employment',
        2000,
        '2020-10-25',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'projection'),
        'income',
        'mom',
        50000,
        '2020-10-25',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'projection'),
        'income',
        'job',
        150000,
        '2020-10-25',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'projection'),
        'income',
        'husband''s job',
        100000,
        '2020-10-25',
        NULL,
        'months',
        1);

INSERT INTO users (username, created)
VALUES ('jane', current_timestamp);
INSERT INTO users (username, created)
VALUES ('john', current_timestamp);
INSERT INTO users (username, created)
VALUES ('jack', current_timestamp);
INSERT INTO users (username, created)
VALUES ('jade', current_timestamp);

INSERT INTO projections (user_id, name, created)
VALUES ((SELECT id FROM users WHERE username = 'jane'), 'Jane''s projection', current_timestamp);
INSERT INTO projections (user_id, name, created, length)
VALUES ((SELECT id FROM users WHERE username = 'john'),'John''s projection', current_timestamp, '6 months');
INSERT INTO projections (user_id, name, created, length)
VALUES ((SELECT id FROM users WHERE username = 'jack'),'Jack''s projection', current_timestamp, '9 months');
INSERT INTO projections (user_id, name, created)
VALUES ((SELECT id FROM users WHERE username = 'jade'),'Jade''s projection', current_timestamp);
INSERT INTO projections (user_id, name, created)
VALUES ((SELECT id FROM users WHERE username = 'jade'),'Jade''s projection 2', current_timestamp);


INSERT INTO bank_accounts (projection_id, name, type, amount_cents)
VALUES ((SELECT id FROM projections WHERE name = 'Jane''s projection'),
        'my checking',
        'checking',
        100000);
INSERT INTO bank_accounts (projection_id, name, type, amount_cents)
VALUES ((SELECT id FROM projections WHERE name = 'John''s projection'),
        'my savings',
        'savings',
        300000);
INSERT INTO bank_accounts (projection_id, name, type, amount_cents)
VALUES ((SELECT id FROM projections WHERE name = 'Jack''s projection'),
        'my checking',
        'checking',
        50000);
INSERT INTO bank_accounts (projection_id, name, type, amount_cents)
VALUES ((SELECT id FROM projections WHERE name = 'Jade''s projection'),
        'my checking',
        'checking',
        1000000);
INSERT INTO bank_accounts (projection_id, name, type, amount_cents)
VALUES ((SELECT id FROM projections WHERE name = 'Jade''s projection 2'),
        'my checking',
        'checking',
        1000000);

INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jane''s projection'),
        'income',
        'job',
        100000,
        '2020-10-25',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'John''s projection'),
        'income',
        'self employment',
        200000,
        '2020-10-25',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jack''s projection'),
        'income',
        'mom',
        50000,
        '2020-10-25',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jade''s projection'),
        'income',
        'job',
        150000,
        '2020-10-25',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jade''s projection'),
        'income',
        'husband''s job',
        100000,
        '2020-10-25',
        NULL,
        'months',
        1);

INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jane''s projection'),
        'expense',
        'Jane''s rent',
        40000,
        '2020-10-26',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jane''s projection'),
        'expense',
        'utilities',
        10000,
        '2020-10-27',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jane''s projection'),
        'expense',
        'netflix',
        1000,
        '2020-10-28',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jane''s projection'),
        'expense',
        'groceries',
        20000,
        '2020-10-29',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jane''s projection'),
        'expense',
        'fun',
        5000,
        '2020-10-30',
        NULL,
        'months',
        1);

INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'John''s projection'),
        'expense',
        'John''s rent',
        40000,
        '2020-10-26',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'John''s projection'),
        'expense',
        'utilities',
        10000,
        '2020-10-27',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'John''s projection'),
        'expense',
        'netflix',
        1000,
        '2020-10-28',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'John''s projection'),
        'expense',
        'groceries',
        20000,
        '2020-10-29',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'John''s projection'),
        'expense',
        'fun',
        5000,
        '2020-10-30',
        NULL,
        'months',
        1);

INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jack''s projection'),
        'expense',
        'Jack''s rent',
        40000,
        '2020-10-26',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jack''s projection'),
        'expense',
        'utilities',
        10000,
        '2020-10-27',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jack''s projection'),
        'expense',
        'netflix',
        1000,
        '2020-10-28',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jack''s projection'),
        'expense',
        'groceries',
        20000,
        '2020-10-29',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jack''s projection'),
        'expense',
        'fun',
        5000,
        '2020-10-30',
        NULL,
        'months',
        1);

INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jade''s projection'),
        'expense',
        'Jade''s rent',
        40000,
        '2020-10-26',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jade''s projection'),
        'expense',
        'utilities',
        10000,
        '2020-10-27',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jade''s projection'),
        'expense',
        'netflix',
        1000,
        '2020-10-28',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jade''s projection'),
        'expense',
        'groceries',
        20000,
        '2020-10-29',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jade''s projection'),
        'expense',
        'fun',
        5000,
        '2020-10-30',
        NULL,
        'months',
        1);

INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jade''s projection 2'),
        'expense',
        'Jade''s rent',
        40000,
        '2020-10-26',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jade''s projection 2'),
        'expense',
        'utilities',
        10000,
        '2020-10-27',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jade''s projection 2'),
        'expense',
        'netflix',
        1000,
        '2020-10-28',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jade''s projection 2'),
        'expense',
        'groceries',
        20000,
        '2020-10-29',
        NULL,
        'months',
        1);
INSERT INTO proj_entries (projection_id, entry_type, name, amount_cents, start_date, end_date, repeats,
                          repeat_frequency)
VALUES ((SELECT id FROM projections WHERE name = 'Jade''s projection 2'),
        'expense',
        'fun',
        5000,
        '2020-10-30',
        NULL,
        'months',
        1);



INSERT INTO pretty_names
VALUES ('users', 'Users');
INSERT INTO pretty_names
VALUES ('username', 'Username');
INSERT INTO pretty_names
VALUES ('name', 'Name');
INSERT INTO pretty_names
VALUES ('created', 'Created On');
INSERT INTO pretty_names
VALUES ('length', 'Length');
INSERT INTO pretty_names
VALUES ('expense', 'Expense');
INSERT INTO pretty_names
VALUES ('income', 'Income');
INSERT INTO pretty_names
VALUES ('entry_type', 'Entry Type');
INSERT INTO pretty_names
VALUES ('amount_cents', 'Amount in Cents');
INSERT INTO pretty_names
VALUES ('start_date', 'Starts on');
INSERT INTO pretty_names
VALUES ('end_date', 'Ends on');
INSERT INTO pretty_names
VALUES ('repeats', 'Repeats');
INSERT INTO pretty_names
VALUES ('repeat_frequency', 'Every');
INSERT INTO pretty_names
VALUES ('checking', 'Checking');
INSERT INTO pretty_names
VALUES ('savings', 'Savings');
INSERT INTO pretty_names
VALUES ('other', 'Other');
INSERT INTO pretty_names
VALUES ('type', 'Account Type');
INSERT INTO pretty_names
VALUES ('pretty_name', 'Pretty Name');
INSERT INTO pretty_names
VALUES ('pretty_names', 'Pretty Names');
INSERT INTO pretty_names
VALUES ('projections', 'Projections');
INSERT INTO pretty_names
VALUES ('repeat_type', 'Repeat Type');
INSERT INTO pretty_names
VALUES ('proj_entries', 'Projection Entries');
INSERT INTO pretty_names
VALUES ('bank_account_type', 'Bank Account Type');
INSERT INTO pretty_names
VALUES ('bank_accounts', 'Bank Accounts');
