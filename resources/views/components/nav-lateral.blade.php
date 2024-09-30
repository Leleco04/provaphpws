<div id="nav">
    <h5 class="ps-5 pt-5 pb-5 texto-nav-lateral">Administrador</h5>
    <div>
        <ul class="d-grid" style="padding-left: 2rem;">
            <li><a class="nav-bar-link" href="{{ route('curso.index') }}">Cursos</a></li>
            <li><a class="nav-bar-link" href="{{ route('turma.index') }}">Turmas</a></li>
            <li><a class="nav-bar-link" href="{{ route('professor.index') }}">Professores</a></li>
            <li><a class="nav-bar-link" href="{{ route('disciplina.index') }}">Disciplinas</a></li>
            <li><a class="nav-bar-link" href="{{ route('aluno.index') }}">Alunos</a></li>
            <li style="margin-top: 10rem;"><a href="{{ route('logout') }}" class="nav-bar-link"
                    style="color: red;">Logout</a></li>
        </ul>
    </div>
</div>
