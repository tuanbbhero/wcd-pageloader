# WCD Pageloader

### Prerequisites

```
Requires WordPress 5.2 as it uses the new after_body hook that was included in the 5.2 release
```

### FAQ

```
Q: I have installed the plugin but cannot see the pageloader?
A: Make sure you have WordPress 5.2 or later
```
```
Q: I have WordPress 5.2+ but still cannot see the pageloader?
A: Contact your theme developer, perhaps they have not included the do_action( 'wp_body_open' ); after the opening body tag.
```
```
Q: How do I change the pageloader animation?
A: Under the Site Identity Panel in the Customiser you will find a text area to paste your SVG code.
I suggest using [loading.io](https://loading.io/) to find a custom animated SVG
```
```
Q: Does it matter what theme I use?
A: No, however your theme developer needs to have included the do_action( 'wp_body_open' ); after the opening body tag.
```