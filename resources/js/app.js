require("./bootstrap");

$(".user-link").click(function(e) {
    const linkUrl = $(this).attr("href");

    const linkId = $(this).data("link-id");

    // console.log(linkId);
    axios
        .post(`/visit/${linkId}`, {
            link: linkUrl
        })
        .then(res => {
            console.log(res);
        })
        .catch(err => {
            console.error(err);
        });
});
