ByeCorps ID
===========

ByeCorps ID is an authentication server mainly for ByeCorps Services, but is open to use in other types of services.

Planned features
----------------

* **OpenID Connect support**

ByeCorps ID will support OpenID Connect, allowing it to act as an SSO provider for most supporting programs without needing to support BCID directly

* and many more...

<!-- Reporting issues
----------------

> [!note]
> To make managing issues easier, issues for BCID are reported in YouTrack rather than on GitHub or shinonome.rocks. -->

Development
-----------

The source code for ByeCorps ID lives in our own git forge, [shinonome.rocks](https://shinonome.rocks/byecorps/id/id), as well as a mirror on GitHub for convenience. 

> [!important]
> Please be aware that we can't accept pull requests originating from GitHub.

Instructions to create a development environment will come soon.

FAQ
---

### What is a ByeCorps ID?

A **ByeCorps ID** (BCID) is a seven digit alphanumeric (non-case sensitive) code used to identify a person. It is used to reduce the need of multiple accounts across ByeCorps services as well as third-party services using OAuth.

Example of a BCID:

```
123-ABC4
```

Canonical domain names
----------------------

Only enter the login details for your BCID on the following domain names, and ONLY on a HTTPS connection:

* https://id.byecorps.com

> [!caution]
> Any other domain name or an insecure connection could be an attempt to 
