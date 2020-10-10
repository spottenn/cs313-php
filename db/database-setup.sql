CREATE TABLE projections (
    id SERIAL NOT NULL PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    created timestamp with time zone NOT NULL,
    length interval not null default '1 year'
);

CREATE TYPE entry_type AS ENUM ('expense', 'income');
CREATE TYPE repeat_type AS ENUM ('once', 'daily', 'monthly', 'yearly');

CREATE TABLE expenses (
    id SERIAL NOT NULL PRIMARY KEY,
    projection_id INT NOT NULL REFERENCES projections(id),
    name VARCHAR(200) NOT NULL,
    amount_cents BIGINT NOT NULL,
    start_date date NOT NULL,
    end_date date,
    repeats repeat_type NOT NULL,
    repeat_frequency INT NOT NULL
);

CREATE TABLE incomes (
    id SERIAL NOT NULL PRIMARY KEY,
    projection_id INT NOT NULL REFERENCES projections(id),
    name VARCHAR(200) NOT NULL,
    amount_cents BIGINT NOT NULL,
    start_date date NOT NULL,
    end_date date,
    repeats repeat_type NOT NULL,
    repeat_frequency INT NOT NULL
);

CREATE TYPE bank_account_type AS ENUM ('checking', 'savings', 'other');

CREATE TABLE bank_accounts (
    id SERIAL NOT NULL PRIMARY KEY,
    projection_id INT NOT NULL REFERENCES projections(id),
    name VARCHAR(200) NOT NULL,
    type bank_account_type NOT NULL,
    amount_cents BIGINT NOT NULL
);
