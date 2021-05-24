
<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="category">
	<div class="container h-100">
		<div class="blog-banner">
			<div class="text-center">
				<h1>Авторизация / Регистрация</h1>
				<nav aria-label="breadcrumb" class="banner-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/">Главная</a></li>
						<li class="breadcrumb-item active" aria-current="page">Авторизация / Регистрация</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- ================ end banner area ================= -->

<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="login_box_img">
					<div class="hover">
						<h4>Велком</h4>
						<p>создай аккаунт</p>
						<a class="button button-account" href="register.html">Создать акк</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner">
					<h3>Вход в ЛК</h3>
					<form class="row login_form" onsubmit="sendForm(this); return false;">
						<div class="col-md-12 form-group">
							<input type="email" class="form-control" name="email" placeholder="Email">
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" name="pass" placeholder="Parol'">
						</div>
						<div class="col-md-12 form-group">
								<p id="info"></p>
						</div>
						<div class="col-md-12 form-group">
							<button type="submit" value="submit" class="button button-login w-100">Авторизоваться</button>
						
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Login Box Area =================-->

<script>
	async function sendForm(form){
		
		let formData = new FormData(form);
		let responce = await fetch("authUser", {
			method: "POST",
			body: formData,
			});
		let res = await responce.json();
		if(res.result == "ok"){
			location.href ="users/profile";
		}else if(res.result == "reject"){
			info.innerText = `Неправильный лог или пасс`;
		}else{
			alert="Неизвестная ошибка((";
		}
	}
</script>