CREATE TABLE projections (
    id SERIAL NOT NULL PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    created timestamp NOT NULL,
    length interval not null default '1 year'
);

CREATE TYPE entry_type AS ENUM ('expense', 'income');
CREATE TYPE repeat_type AS ENUM ('once', 'days', 'weeks', 'months', 'years');

CREATE TABLE proj_entries (
    id SERIAL NOT NULL PRIMARY KEY,
    projection_id INT NOT NULL REFERENCES projections(id),
    entry_type entry_type NOT NULL,
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
