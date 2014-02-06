class SignUpController < ApplicationController
  before_filter :set_type

  # GET /sign_up/:type
  def new
    @user = User.new
    
    if @type == 'student'
      @school = School.new
      @course = Course.new
      @classroom = Classroom.new
      @period = Period.new  
      @student = Student.new
    elsif @type == 'teacher'
      @teacher = Teacher.new
    end
  end

  # POST /sign_up/:type
  # POST /sign_up/:type.json
  def create
    @user = User.new(params.require(:user).permit(:name, :email, :password, :password_confirmation, :gender, :birthdate))

    if @type == 'student'
      @resource = Student.new

      @school = School.new(params.require(:school).permit(:name))

      @course = Course.new(params.require(:course).permit(:name))
      @course.school = @school

      @period = Period.new(params.require(:period).permit(:name))
      @period.school = @school
      @period.school_year = SchoolYear.where(year: Time.now.year).first

      @classroom = Classroom.new(params.require(:classroom).permit(:name))
      @classroom.course = @course
      @classroom.period = @period
    elsif @type == 'teacher'
      @resource = Teacher.new
    end

    @resource.user = @user

    respond_to do |format|
      if @user.valid? && @resource.valid? && (@type == 'teacher' || @type == 'student' && @school.valid? && @course.valid? && @classroom.valid? && @period.valid?)
        @user.save
        @resource.save

        if @type == 'student'
          @school.save 
          @course.save 
          @classroom.save 
          @period.save 
        end
        
        format.html { redirect_to @resource, notice: 'Successfully created.' }
        format.json { render action: 'show', status: :created, location: @resource }
      else
        format.html { render action: 'new' }
        format.json { render json: @resource.errors, status: :unprocessable_entity }
      end
    end
  end

private

  def set_type
    @type = params[:type]
  end
end
