<template>
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <p>{{comment.body}}</p>
                <small>{{comment.created_at}}</small>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['comment'],
    created() {

    }
}
</script>
