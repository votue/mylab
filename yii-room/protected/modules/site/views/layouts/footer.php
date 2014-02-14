<script type="text/javascript">
    $(document).ready(function(){
        $('#postTags').tagsinput({
            typeahead: {
                source: <?php echo Tag::getAllTagInputs() ?>,
            },
            maxTags: 5,
        });
    })
</script>